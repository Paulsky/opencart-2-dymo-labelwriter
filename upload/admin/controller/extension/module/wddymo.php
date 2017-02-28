<?php

class ControllerExtensionModuleWddymo extends Controller
{

    private $error = [];


    public function index()
    {
        /* Load language file. */
        $this->load->language('extension/module/wddymo');

        if ( ! $this->request->server['REQUEST_METHOD'] == 'POST') {
            return $this->response->redirect($this->request->server['HTTP_REFERER']);
        }

        $ids = $this->request->post['selected'];

        if ( ! isset($ids)) {
            return $this->response->redirect($this->request->server['HTTP_REFERER']);
        }
        //load Order Model
        $this->load->model('sale/order');

        //$this->request->post
        $addresses = [];

        foreach ($ids as $id) {
            $address = $this->getLabelAddress($id);
            if (isset($address)) {
                array_push($addresses, $address);
            }
        }

        $data['addresses'] = json_encode($addresses);

        $this->response->setOutput($this->load->view('extension/module/wddymo.tpl', $data));
    }


    private function getLabelAddress($id)
    {
        //Get Order data
        $order_info = $this->model_sale_order->getOrder($id);

        //format shipping address for label
        if ($order_info) {
            if ($order_info['shipping_address_format']) {
                $format = $order_info['shipping_address_format'];
            } else {
                $format = '{firstname} {lastname}'."\n".'{company}'."\n".'{address_1} {address_2}'."\n".'{postcode} {city}'."\n".'{zone}'."\n".'{country}';
            }

            $find = [
                '{firstname}',
                '{lastname}',
                '{company}',
                '{address_1}',
                '{address_2}',
                '{city}',
                '{postcode}',
                '{zone}',
                '{zone_code}',
                '{country}'
            ];

            $replace = [
                'firstname' => $this->firstUpperCase($order_info['shipping_firstname']),
                'lastname'  => $this->firstUpperCase($order_info['shipping_lastname']),
                'company'   => $this->firstUpperCase($order_info['shipping_company']),
                'address_1' => $this->firstUpperCase($order_info['shipping_address_1']),
                'address_2' => $this->firstUpperCase($order_info['shipping_address_2']),
                'city'      => $this->firstUpperCase($order_info['shipping_city']),
                'postcode'  => $this->allUpperCase($order_info['shipping_postcode']),
                'zone'      => $this->firstUpperCase($order_info['shipping_zone']),
                'zone_code' => $this->firstUpperCase($order_info['shipping_zone_code']),
                'country'   => $this->firstUpperCase($order_info['shipping_country'])
            ];

            $shipping_address = trim(str_replace($find, $replace, $format));
            $shipping_address = preg_replace('/^[ \t]*[\r\n]+/m', '', $shipping_address);

            return $shipping_address;

        }

        return null;

    }


    private function firstUpperCase($string)
    {
        $string = ucwords(strtolower($string));

        return $string;
    }


    private function getPostCode($string)
    {
        $code = str_split($this->allUpperCase(str_replace(' ', '', $string)), 4);
        $postcode = $code[0].' '.$code[1];
        return $postcode;
    }


    private function allUpperCase($string)
    {
        $string = strtoupper($string);

        return $string;
    }

}