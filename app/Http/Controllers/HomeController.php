<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    private $context;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->context = app('aimeos.context')->get();

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Aimeos\MShop\Exception
     */
    public function index()
    {
        $params = [];
        $catId = 1;
        $params['promo_data'] = $this->getPromoData($catId);
        return view('home', $params);

    }

    /**
     * @param null $catId
     * @return array
     * @throws \Aimeos\MShop\Exception
     */
    private function getPromoData($catId = null)
    {
        $config = $this->context->getConfig();
        $params = [];
        if ($catId == null) {
            $catId = $config->get('client/html/catalog/lists/catid-default', '');
        }

        $manager = \Aimeos\MShop::create($this->context, 'catalog');
        try {
            $tree = $manager->getTree($catId, ['media', 'text', 'product', 'price'], \Aimeos\MW\Tree\Manager\Base::LEVEL_ONE);
        } catch (\Exception $e) {
            return [];
        }

        foreach ($tree->toList() as $key => $category) {
            $params[$key]['catalog'] = $category;

            if (($children = $this->getChildren($category->getId())) !== false) {
                $params[$key]['sub_catalog'] = $children;
                $params[$key]['promotion'] = $this->getRootPromotions($children);
            }
        }
        return $params;
    }

    /**
     * @param $catId
     * @return false
     * @throws \Aimeos\MShop\Exception
     */
    private function getChildren($catId)
    {
        $manager = \Aimeos\MShop::create($this->context, 'catalog');
        $tree = $manager->getTree($catId, ['media', 'text', 'product', 'price'], \Aimeos\MW\Tree\Manager\Base::LEVEL_TREE);
        if (count($tree->getChildren()) > 0) {
            return $tree->getChildren()->slice(0, 8);
        }
        return false;
    }

    /**
     * @param $children
     * @return array
     */
    public function getRootPromotions($children)
    {

        $return = $data['products'] = $data['banner'] = [];
        foreach ($children as $child) {
            foreach ($child->getListItems('product', 'promotion')->getRefItem() as $product) {
                $data['products'][$product->getId()] = $product;

            }
            if (count($child->getRefItems('media', 'default'))) {
                foreach ($child->getRefItems('media', 'default') as $banner) {
                    $data['banner'][$banner->getId()] = $child;
                }
            }
        }
        if (count($data['products']) >= 4 && count($data['banner']) > 0) {
            shuffle($data['products']);
            $return['products'] = array_slice($data['products'], 0, 4);

            shuffle($data['banner']);
            $return['banner'] = array_slice($data['banner'], 0, 1);
        }
        return $return;
    }
}
