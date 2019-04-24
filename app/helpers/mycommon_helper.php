<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('show_flashdata_frontend')) {
    function show_flashdata_frontend($body = TRUE)
    {
        $result = '';
        $CI =& get_instance();
        $message = $CI->session->flashdata('message-success');
        if (isset($message)) {
            if ($body == TRUE) $result = $result . '<div class="uk-container uk-container-center"><div class="alert alert-success uk-margin-top uk-margin-bottom" data-uk-alert>';
            $result = $result . '<a href="#" class="close uk-close"></a><p>' . $message . '</p>';
            if ($body == TRUE) $result = $result . '</div></div>';
            return $result;
        }
        $message = $CI->session->flashdata('message-danger');
        if (isset($message)) {
            if ($body == TRUE) $result = $result . '<div class="uk-container uk-container-center"><div class="alert alert-danger uk-margin-top uk-margin-bottom" data-uk-alert>';
            $result = $result . '<a href="#" class="alert-close close"></a><p>' . $message . '</p>';
            if ($body == TRUE) $result = $result . '</div></div>';
            return $result;
        }
    }
}

// if(!function_exists('fb_login_link')){
//  	function fb_login_link(){
//   		$CI =& get_instance();
//   		$app_path = substr(APPPATH, 0, -4);
//   		require($app_path.'/plugins/php-graph-sdk-5.5/src/Facebook/autoload.php');
//   		$fb = new Facebook\Facebook([
// 		    'app_id' => '256408298179364', // Replace {app-id} with your app id
// 		    'app_secret' => '3f80035865379a6e0f12159d87004921',
// 		    'default_graph_version' => 'v2.2',
//    		]);
//   		$helper = $fb->getRedirectLoginHelper();
//   		$permissions = ['email']; // Optional permissions
//   		$loginUrl = $helper->getLoginUrl(base_url('customers/manage/manage/fbcallback'), $permissions);
//   		return $loginUrl;
//  	}
// }


// if(!function_exists('google_login_link')){
//  	function google_login_link(){
//   		$CI =& get_instance();
//   		$app_path = substr(APPPATH, 0, -4);
//   		require($app_path.'plugins/google_sdk/Google/autoload.php');
//   		$clientId = '436185409308-5mdtrpoqk3044hoivg0hfu3eg20feauv.apps.googleusercontent.com';
//   		$clientSecret = '5umQA9kH-xpELQKUSiLYX0xH';
//   		$redirectURL = 'http://tinhdau100.codechuanseo.com/customers/manage/manage/google';
//   		//Call Google API
//   		$gClient = new Google_Client();
//   		$gClient->setApplicationName('Login');
//   		$gClient->setClientId($clientId);
//   		$gClient->setClientSecret($clientSecret);
//   		$gClient->setRedirectUri($redirectURL);
//   		$gClient->setScopes(array(
// 		   "https://www.googleapis.com/auth/plus.login",
// 		   "https://www.googleapis.com/auth/plus.me",
// 		   "https://www.googleapis.com/auth/userinfo.email",
// 		   "https://www.googleapis.com/auth/userinfo.profile"
//    		));
//   		/* ---------------------------------------------- */
//   		$authUrl = $gClient->createAuthUrl();
//   		$output = filter_var($authUrl, FILTER_SANITIZE_URL);
//   		return $output;
//  	}
// }

if (!function_exists('convert_date')) {
    function convert_date($timed)
    {
        $string = '';
        $CI =& get_instance();
        $string .= $CI->lang->line('day') . ' ' . show_time($timed, 'd');
        $string .= ' ' . $CI->lang->line('month') . ' ' . show_time($timed, 'm') . ' ';
        $string .= $CI->lang->line('year') . ' ' . show_time($timed, 'Y');
        return $string;
    }
}
if (!function_exists('Load_place')) {
    function Load_place($projectid = 0, $wardid = 0, $districtid = 0)
    {
        $CI =& get_instance();
        if ($projectid != 0) {
            $result = $CI->FrontendProjects_Model->read_place($projectid);
        } elseif ($wardid != 0) {
            $result = $CI->FrontendProjects_Model->read_location($wardid);
        } elseif ($districtid != 0) {
            $result = $CI->FrontendProjects_Model->read_location($districtid);
        } else {
            $result = '...';
        }
        return $result;
    }
}
if (!function_exists('Load_catagoies')) {
    function Load_catagoies($arr = '', $modules = 'articles')
    {
        $CI =& get_instance();
        $CI->load->model('Autoload_model');
        $atr = '';
        if (isset($arr) && is_array($arr) && count($arr)) {
            foreach ($arr as $key => $val) {
                $atr[] = $CI->Autoload_model->_get_where(array(
                    'select' => 'id, title, slug, canonical',
                    'table' => $modules . '_catalogues',
                    'where' => array('id' => $val),
                    'order_by' => 'order desc',
                ), FALSE);
            }
        }
        return $atr;
    }
}
if (!function_exists('code_generator')) {
    function code_generator($module = '')
    {
        $CI =& get_instance();
        $user = $CI->config->item('fcUser');
        $CI->db->select('id');
        $CI->db->from($module);
        $CI->db->where(array('trash' => 0));
        $CI->db->order_by('id desc');
        $result = $CI->db->get()->row_array();
        $code = '#' . $user['id'] . '_' . (10000 + $result['id'] + 1);
        return $code;
    }
}

if (!function_exists('thongketruycap')) {
    function thongketruycap()
    {
        $CI =& get_instance();
        ?>
        <header class="panel-head">
            <h3 class="heading"><span> Thống kê truy cập </span></h3>
        </header>
        <section class="panel-body">
            <?php
            $CI->db->select('*')->from('counter_values');
            $row = $CI->db->get()->row_array();

            $CI->db->select('*')->from('counter_ips');
            $online = $CI->db->count_all_results();
            ?>
            <ul class="online">
                <li>Đang online: <?php echo $online; ?></li>
                <li>Tổng truy cập: <?php echo $row['all_value']; ?></li>
            </ul>
        </section>
        <?php
    }
}


if (!function_exists('getCurrentPageURL')) {
    function getCurrentPageURL()
    {
        $pageURL = 'http';
        if (!empty($_SERVER['HTTPS'])) {
            if ($_SERVER['HTTPS'] == 'on') {
                $pageURL .= "s";
            }
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}
if (!function_exists('links_share')) {
    function links_share()
    {
        global $sitename;
        ?>
        <div class="connenct">
            <script src="https://apis.google.com/js/platform.js" async defer>
                {
                    lang: 'vi'
                }
            </script>
            <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + '://platform.twitter.com/widgets.js';
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, 'script', 'twitter-wjs');</script>
            <div class="g-plus" data-action="share" data-annotation="bubble"
                 data-href="<?php echo getCurrentPageURL(); ?>"></div>
            <div class="fb-like" data-href="<?php echo getCurrentPageURL(); ?>" data-layout="button_count"
                 data-action="like" data-show-faces="true" data-share="true"></div>
            <div class="fb-send" data-href="<?php echo getCurrentPageURL(); ?>"></div>
            <a href="https://twitter.com/share" class="twitter-share-button"
               data-url="<?php echo getCurrentPageURL(); ?>" data-via="<?php echo $sitename ?>">Tweet</a>

        </div>
        <?php
    }
}

if (!function_exists('coment_fb')) {
    function coment_fb()
    {
        ?>
        <div class="comment_fb">
            <div class="fb-comments" data-href="<?php echo getCurrentPageURL(); ?>" data-numposts="5"
                 data-width="100%"></div>
        </div>
        <?php
    }
}

if (!function_exists('show_flashdata')) {
    function show_flashdata($body = TRUE)
    {
        $result = '';
        $CI =& get_instance();
        $message = $CI->session->flashdata('message-success');
        if (isset($message)) {
            if ($body == TRUE) $result = $result . '<div class="box-body">';
            $result = $result . '<div class="callout callout-success">';
            $result = $result . '<p>' . $message . '</p>';
            $result = $result . '</div>';
            if ($body == TRUE) $result = $result . '</div><!-- /.box-body -->';
            return $result;
        }
        $message = $CI->session->flashdata('message-danger');
        if (isset($message)) {
            if ($body == TRUE) $result = $result . '<div class="box-body">';
            $result = $result . '<div class="callout callout-danger">';
            $result = $result . '<p>' . $message . '</p>';
            $result = $result . '</div>';
            if ($body == TRUE) $result = $result . '</div><!-- /.box-body -->';
            return $result;
        }
    }
}

if (!function_exists('selecteddropdown')) {
    function selecteddropdown($dropdown = NULL)
    {
        $temp = NULL;
        foreach ($dropdown as $key => $val) {
            $temp[] = $key;
        }
        return $temp;
    }
}

if (!function_exists('convert_time')) {
    function convert_time($time = '')
    {
        $current = explode('-', $time);
        $date = explode('/', trim($current[1]));
        $time_stamp = $date[2] . '-' . $date[1] . '-' . $date[0] . ' ' . trim($current[0]) . ':00';
        return $time_stamp;
    }
}

if (!function_exists('remake_array')) {
    function remake_array($array = '', $keyword = '')
    {
        $temp = '';
        if (isset($array) && is_array($array) && count($array)) {
            foreach ($array as $key => $val) {
                $temp[] = $val[$keyword];
            }
        }
        return $temp;
    }
}
if (!function_exists('get_videos_code')) {
    function get_videos_code($url = '')
    {
        $result = '';
        if (!empty($url)) {
            $result = explode('?v=', $url);
        }
        return $result[1];
    }
}

if (!function_exists('location_dropdown')) {
    function location_dropdown($keyword = '', $where = '')
    {
        $dropdown[0] = '--' . 'Chọn ' . $keyword . '--';
        $CI =& get_instance();
        $CI->load->model('Autoload_model');
        $result = $CI->Autoload_model->_get_where(array(
            'select' => 'id, title',
            'table' => 'province',
            'where' => $where,
            'order_by' => 'order desc, title asc',
        ), TRUE);
        if (isset($result) && is_array($result) && count($result)) {
            foreach ($result as $key => $val) {
                $dropdown[$val['id']] = $val['title'];
            }
        }
        return $dropdown;
    }
}


if (!function_exists('percent')) {
    function percent($price = 0, $saleoff = 0)
    {
        $percent = ($price - $saleoff) / $price * 100;
        return $percent;
    }
}


if (!function_exists('check_delete')) {
    function check_delete($param = '', $modules = 'articles')
    {
        // param là list các id bài viết, sản phẩm ...
        $CI =& get_instance();
        $CI->load->model('routers/BackendRouters_Model');
        $model = 'Backend' . ucfirst($modules) . '_Model';
        $flag = 0;
        $_temp_ = '';
        $_list_ = $CI->$model->_get_where(array(
            'select' => 'id, slug, canonical, catalogues',
            'table' => $modules,
            'where' => array('trash' => 0),
            'where_in' => $param,
            'where_in_field' => 'id'
        ), TRUE);


        if (isset($_list_) && is_array($_list_) && count($_list_)) {
            foreach ($_list_ as $key => $val) {
                $json_decode_catalogues = json_decode($val['catalogues'], TRUE);
                if (count($json_decode_catalogues) == 1) {
                    // xóa trong catalogues relationship
                    $CI->$model->_delete_relationship($modules, $val['id']);
                    $_temp_[] = array(
                        'id' => $val['id'],
                        'canonical' => $val['canonical'],
                    ); // mảng id của những bài viết sẽ xóa
                }
            }
        }

        if (isset($_temp_) && is_array($_temp_) && count($_temp_)) {
            foreach ($_temp_ as $key => $val) {
                // xóa trong bảng routers
                $CI->BackendRouters_Model->Delete($val['canonical'], $modules . '/frontend/' . $modules . '/view', $val['id'], 'number');
                // xóa bài viết --> cập nhật canonical bài viết về 0
                $_update_['table'] = $modules;
                $_update_['where'] = array('id' => $val['id'],);
                $_update_['data'] = array('trash' => 1, 'canonical' => '');
                $CI->$model->_delete($_update_);
            }
        }

    }
}


if (!function_exists('catalogues_relationship')) {
    function catalogues_relationship($cataloguesid = 0, $modules = 'articles', $model = '', $table = 'articles', $lang = 'vietnamese', $param = '')
    {
        $CI =& get_instance();
        if (isset($model) && is_array($model) && count($model)) {
            foreach ($model as $key => $val) {
                $CI->load->model($modules . '/' . $val . '_Model');
            }
        }

        $model_cat = $model[1] . '_Model';

        $detail_catalogues = $CI->$model_cat->_get_where(array(
            'table' => $table,
            'where' => array('id' => $cataloguesid, 'alanguage' => $lang),
            'select' => 'id, title, slug, canonical, lft, rgt',
            'trash' => 0
        ), FALSE);

        $_id_list = '';
        $_article_id_list = '';
        $result_1 = '';
        if ($detail_catalogues['rgt'] - $detail_catalogues['lft'] > 1) {
            $result = $CI->$model_cat->_get_where(array(
                'table' => $table,
                'where' => array(
                    'lft >=' => $detail_catalogues['lft'],
                    'rgt <=' => $detail_catalogues['rgt'],
                    'trash' => 0,
                ),
                'select' => 'id',
            ), TRUE);
            if (isset($result) && is_array($result) && count($result)) {
                foreach ($result as $key => $val) {
                    $_id_list[] = $val['id'];
                }
            }
            if (isset($_id_list) && is_array($_id_list) && count($_id_list)) {
                $result_1 = $CI->db->select('modulesid')->from('catalogues_relationship')->where(array('modules' => $modules))->where_in('cataloguesid', $_id_list)->group_by('modulesid')->get()->result_array();
            }
        } else {
            $result_1 = $CI->db->select('modulesid')->from('catalogues_relationship')->where(array('cataloguesid' => $cataloguesid, 'modules' => $modules))->get()->result_array();

        }
        if (isset($result_1) && is_array($result_1) && count($result_1)) {
            foreach ($result_1 as $key => $val) {
                $_article_id_list[] = $val['modulesid'];
            }
        }

        return $_article_id_list;
    }
}

if (!function_exists('user_statistic')) {
    function user_statistic($week = '')
    {
        $CI =& get_instance();
        $day = date('w');
        $temp['week_start'] = date('Y-m-d', strtotime('-' . $day . ' days')) . ' 00:00:00';
        $temp['week_end'] = date('Y-m-d', strtotime('+' . (6 - $day) . ' days')) . ' 00:00:00';
        $temp_1 = '';
        if ($week == 'current') {
            $CI->db->select('*, DATE_FORMAT(created,\'%a\') AS daybyday ');
            $CI->db->from('users_online');
            $CI->db->where(array(
                'created >=' => $temp['week_start'],
                'created <=' => $temp['week_end'],
            ));
            $result = $CI->db->get()->result_array();
            $temp_1 = converday($result);
            return $temp_1;
        }
        if ($week = 'lastweek') {
            $previous_week = strtotime("-1 week +1 day");
            $start_week = strtotime("last sunday midnight", $previous_week);
            $end_week = strtotime("next saturday", $start_week);

            $temp['week_start'] = date("Y-m-d", $start_week);
            $temp['week_end'] = date("Y-m-d", $end_week);
            $CI->db->select('*, DATE_FORMAT(created,\'%a\') AS daybyday ');
            $CI->db->from('users_online');
            $CI->db->where(array(
                'created >=' => $temp['week_start'],
                'created <=' => $temp['week_end'],
            ));
            $result = $CI->db->get()->result_array();
            $temp_1 = converday($result);
            return $temp_1;
        }
    }
}

if (!function_exists('converday')) {
    function converday($param = '')
    {
        $CI =& get_instance();
        $result = '';
        $date = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
        foreach ($date as $key => $val) {
            $result[] = array(
                'value' => count_array_by_value($param, $val),
            );

        }
        return $result;
        // $timestamp = gmdate('D', strtotime($val['created'])+7*3600);
        // echo gmdate('D', strtotime('2016-11-22')+7*3600);die();

    }
}

if (!function_exists('count_array_by_value')) {
    function count_array_by_value($array = '', $value = 0, $keyword = 'daybyday')
    {
        $total = 0;
        foreach ($array as $key => $val) {
            if ($val[$keyword] == $value) {
                $total = $total + 1;
            }
        }
        return $total;

    }
}

if (!function_exists('count_array_by_condition')) {
    function count_array_by_condition($array = '', $value = 0, $keyword = 'district')
    {
        $total = 0;
        foreach ($array as $key => $val) {
            if ($val[$keyword] == $value) {
                $total = $total + $val['price'] * $val['quantity'];
            }
        }
        return $total;

    }
}


if (!function_exists('mail_html')) {
    function mail_html($param = NULL)
    {
        $CI =& get_instance();
        return '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><section style="max-width:600px;margin:0 auto;background:#f8f8f8;border:1px solid #d8d8d8; font-family:Arial,sans-serif; font-size:14px;line-height:20px; border-radius: 10px; margin-top: 30px;"><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;"><div style="display: block;width: 100%;height: 100%;-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;"><img src="' . BASE_URL . $CI->fcSystem['homepage_cover'] . '" alt="" style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;display: block;width: 100%;height: 100%;object-fit: cover;"></div><h1 style="box-sizing:border-box;text-align:center;margin:-20px 0 10px 0;"><span style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;position: relative;display: inline-block;padding: 7px 30px;line-height: 24px;font-size: 16px;color: #00af1d;font-weight: bold;text-align: center;text-transform: uppercase;background: #fff;border-radius: 20px;box-shadow: 0 1px 2px 0 rgba(0,0,0,.16);-webkit-transform: translate(0, -50%);-ms-transform: translate(0, -50%);-o-transform: translate(0, -50%);transform: translate(0, -50%);"> Đặt hàng thành công</span></h1><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;padding: 0 20px 20px 20px;"><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;margin-bottom: 20px;">Cảm ơn <strong style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;">anh ' . $param['fullname'] . '</strong> đã cho ' . $param['web'] . ' cơ hội được phục vụ. Nhân viên sẽ liên hệ lại với anh để xác nhận thông tin đặt hàng trong 5 phút.</div><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;padding: 5px 10px;margin-bottom: 10px;text-transform: uppercase;background: #f3f3f3;">Thông tin đặt hàng:</div><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;"><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;position: relative;padding-left: 15px;margin-bottom: 5px;">Địa chỉ nhận hàng: ' . $param['address'] . '</div><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;position: relative;padding-left: 15px;margin-bottom: 5px;"><strong style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;">Thanh toán tiền mặt khi nhận hàng</strong></div><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;position: relative;padding-left: 15px;margin-bottom: 5px;">Tổng tiền: <span style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;font-weight: bold;color: #c10017;">' . (str_replace(',', '.', $param['total_price'])) . '₫</span></div></div><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;margin-bottom: 20px;">Trước khi giao nhân viên sẽ liên lạc với anh <strong style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;">anh ' . $param['fullname'] . '</strong>để xác nhận. Khi cần trợ giúp vui lòng gọi <a href="tel:' . $param['hotline'] . '" title="" style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;font-weight: bold;color: #288ad6;">' . $param['hotline'] . '</a> hoặc <a href="tel:' . $param['phone'] . '" title="" style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;font-weight: bold;color: #288ad6;">' . $param['phone'] . '</a> (7h30 - 22h)</div><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;padding: 5px 10px;margin-bottom: 10px;text-transform: uppercase;background: #f3f3f3;">Sản phẩm đã mua:</div><ul style="margin: 0;padding: 0;list-style: none;-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;">' . $param['product'] . '</ul><div style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;text-align: center;margin-top: 30px;"><a href="' . $param['web'] . '" title="" style="-o-box-sizing: border-box;-ms-box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;text-decoration: none;display: inline-block;overflow: hidden;background: #fff;line-height: 40px;width: 250px;font-size: 14px;color: #288ad6;font-weight: 600;text-transform: uppercase;border: 1px solid #288ad6;border-radius: 4px;-webkit-transition: all .25s linear;-o-transition: all .25s linear;transition: all .25s linear;">Mua thêm sản phẩm khác</a></div></div></div></section>';
    }
}