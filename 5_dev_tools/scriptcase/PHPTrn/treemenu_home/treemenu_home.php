<?php
include_once('treemenu_home_session.php');
session_start();
$tmp_useragent                           = $_SERVER['HTTP_USER_AGENT'];
$_SESSION['scriptcase']['device_mobile'] = preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$tmp_useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($tmp_useragent,0,4));
if ($_SESSION['scriptcase']['device_mobile'])
{
    if (!isset($_SESSION['scriptcase']['display_mobile']))
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
    if ($_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'out' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = false;
    }
    elseif (!$_SESSION['scriptcase']['display_mobile'] && isset($_POST['_sc_force_mobile']) && 'in' == $_POST['_sc_force_mobile'])
    {
        $_SESSION['scriptcase']['display_mobile'] = true;
    }
}
else
{
    $_SESSION['scriptcase']['display_mobile'] = false;
}
$_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'] = "/scriptcase/prod";
$_SESSION['scriptcase']['treemenu_home']['glo_nm_perfil']    = "";
$_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao']   = "conn_example";
$_SESSION['scriptcase']['treemenu_home']['glo_nm_usa_grupo'] = "S";

class treemenu_home_class
{
  var $Db;

 function sc_Include($path, $tp, $name)
 {
     if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
     {
         include_once($path);
     }
 } // sc_Include

 function treemenu_home_menu()
 {
    global $treemenu_home_menuData;
    if (isset($_POST["nmgp_idioma"]))  
    { 
        $Temp_lang = explode(";" , $_POST["nmgp_idioma"]);  
        if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
         { 
             $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
        } 
        if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
        { 
             $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
        } 
    } 
  
    if (isset($_POST["nmgp_schema"]))  
    { 
        $_SESSION['scriptcase']['str_schema_all'] = $_POST["nmgp_schema"] . "/" . $_POST["nmgp_schema"];
    } 
   
$nm_versao_sc  = "" ; 
$_SESSION['scriptcase']['treemenu_home']['contr_erro'] = 'off';
if (isset($_POST) && !empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
        $$nmgp_var = $nmgp_val;
    }
}
if (isset($_GET) && !empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
        $$nmgp_var = $nmgp_val;
    }
}
$nm_url_saida = "";
if (isset($nmgp_url_saida))
{
    $nm_url_saida = $nmgp_url_saida;
    if (isset($script_case_init))
    {
        $nm_url_saida .= "?script_case_init=" . $script_case_init;
    }
}
if (isset($_POST["nmgp_idioma"]) || isset($_POST["nmgp_schema"]))  
{ 
    $nm_url_saida = $_SESSION['scriptcase']['sc_saida_treemenu_home'];
}
elseif (!empty($nm_url_saida))
{
    $_SESSION['scriptcase']['sc_url_saida'][$script_case_init]  = $nm_url_saida;
    $_SESSION['scriptcase']['sc_saida_treemenu_home'] = $nm_url_saida;
}
else
{
    $_SESSION['scriptcase']['sc_saida_treemenu_home'] = (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "javascript:window.close()";
}
$Campos_Mens_erro = "";
$sc_site_ssl   = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys          = str_replace("\\", '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
//check prod
if(empty($_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod']))
{
        /*check prod*/$_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
}
$this->sc_charset['UTF-8'] = 'utf-8';
$this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
$this->sc_charset['SJIS'] = 'shift-jis';
$this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
$this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
$this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
$this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
$this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
$this->sc_charset['WINDOWS-1252'] = 'windows-1252';
$this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
$this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
$this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
$this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
$this->sc_charset['KOI8-R'] = 'koi8-r';
$this->sc_charset['WINDOWS-1251'] = 'windows-1251';
$this->sc_charset['BIG-5'] = 'big5';
$this->sc_charset['EUC-CN'] = 'EUC-CN';
$this->sc_charset['EUC-JP'] = 'euc-jp';
$this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
$this->sc_charset['EUC-KR'] = 'euc-kr';
$this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
$this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
$this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
$this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
$this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
$str_path_web   = $_SERVER['PHP_SELF'];
$str_path_web   = str_replace("\\", '/', $str_path_web);
$str_path_web   = str_replace('//', '/', $str_path_web);
$str_root       = substr($str_path_sys, 0, -1 * strlen($str_path_web));
$path_link      = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_link      = substr($path_link, 0, strrpos($path_link, '/')) . '/';
$path_btn       = $str_root . $path_link . "_lib/buttons/";
$path_imag_cab  = $path_link . "_lib/img";
$this->path_botoes    = '../_lib/img';
$this->path_imag_apl  = $str_root . $path_link . "_lib/img";
$path_help      = $path_link . "_lib/webhelp/";
$path_libs      = $str_root . $_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'] . "/lib/php";
$path_third     = $str_root . $_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'] . "/third";
$url_third      = $_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'] . "/third";
$path_adodb     = $str_root . $_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'] . "/third/adodb";
$path_apls      = $str_root . substr($path_link, 0, strrpos($path_link, '/'));
$path_img_old   = $str_root . $path_link . "treemenu_home/img";
$this->path_css = $str_root . $path_link . "_lib/css/";
$path_lib_php   = $str_root . $path_link . "_lib/lib/php";
$menu_mobile_hide          = 'N';
$menu_mobile_inicial_state = 'escondido';
$menu_mobile_hide_onclick  = 'S';
$menutree_mobile_float     = 'S';
$menu_mobile_hide_icon     = 'N';
$mobile_menu_mobile_hide          = 'S';
$mobile_menu_mobile_inicial_state = 'aberto';
$mobile_menu_mobile_hide_onclick  = 'S';
$mobile_menutree_mobile_float     = 'S';
$mobile_menu_mobile_hide_icon     = 'N';
if (isset($_SESSION['scriptcase']['user_logout']))
{
    foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
    {
        if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
        {
            unset($_SESSION['scriptcase']['user_logout'][$ind]);
            $nm_apl_dest = $parms['R'];
            $dir = explode("/", $nm_apl_dest);
            if (count($dir) == 1)
            {
                $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
            }
?>
            <html>
            <body>
            <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
            </form>
            <script>
             document.FRedirect.submit();
            </script>
            </body>
            </html>
<?php
            exit;
        }
    }
}
if (!defined("SC_ERROR_HANDLER"))
{
    define("SC_ERROR_HANDLER", 1);
    include_once(dirname(__FILE__) . "/treemenu_home_erro.php");
}
include_once(dirname(__FILE__) . "/treemenu_home_erro.class.php"); 
$this->Erro = new treemenu_home_erro();
$str_path = substr($_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'], 0, strrpos($_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'], '/') + 1);
if (!is_file($str_root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
{
    unset($_SESSION['scriptcase']['nm_sc_retorno']);
    unset($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao']);
}
/* Path definitions */
$treemenu_home_menuData          = array();
$treemenu_home_menuData['path']  = array();
$treemenu_home_menuData['url']   = array();
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual))
{
    $treemenu_home_menuData['path']['sys'] = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $treemenu_home_menuData['path']['sys'] = str_replace("\\", '/', $str_path_sys);
    $treemenu_home_menuData['path']['sys'] = str_replace('//', '/', $str_path_sys);
}
else
{
    $sc_nm_arquivo                                   = explode("/", $_SERVER['PHP_SELF']);
    $treemenu_home_menuData['path']['sys'] = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$treemenu_home_menuData['url']['web']   = $_SERVER['PHP_SELF'];
$treemenu_home_menuData['url']['web']   = str_replace("\\", '/', $treemenu_home_menuData['url']['web']);
$treemenu_home_menuData['path']['root'] = substr($treemenu_home_menuData['path']['sys'],  0, -1 * strlen($treemenu_home_menuData['url']['web']));
$treemenu_home_menuData['path']['app']  = substr($treemenu_home_menuData['path']['sys'],  0, strrpos($treemenu_home_menuData['path']['sys'],  '/'));
$treemenu_home_menuData['path']['link'] = substr($treemenu_home_menuData['path']['app'],  0, strrpos($treemenu_home_menuData['path']['app'],  '/'));
$treemenu_home_menuData['path']['link'] = substr($treemenu_home_menuData['path']['link'], 0, strrpos($treemenu_home_menuData['path']['link'], '/')) . '/';
$treemenu_home_menuData['path']['app'] .= '/';
$treemenu_home_menuData['url']['app']   = substr($treemenu_home_menuData['url']['web'],  0, strrpos($treemenu_home_menuData['url']['web'],  '/'));
$treemenu_home_menuData['url']['link']  = substr($treemenu_home_menuData['url']['app'],  0, strrpos($treemenu_home_menuData['url']['app'],  '/'));
if ($_SESSION['scriptcase']['treemenu_home']['glo_nm_usa_grupo'] == "S")
{
    $treemenu_home_menuData['url']['link']  = substr($treemenu_home_menuData['url']['link'], 0, strrpos($treemenu_home_menuData['url']['link'], '/'));
}
$treemenu_home_menuData['url']['link']  .= '/';
$treemenu_home_menuData['url']['app']   .= '/';

/* Menu items */
$nm_img_fun_menu = ""; 
if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
{
    $_SESSION['scriptcase']['str_lang'] = "en_us";
}
if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
{
    $_SESSION['scriptcase']['str_conf_reg'] = "en_us";
}
$this->str_lang        = $_SESSION['scriptcase']['str_lang'];
$this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
if (!function_exists("NM_is_utf8"))
 {
   include_once("treemenu_home_nmutf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('PHPTrn');
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_gray_shop/sc_gray_shop";
if ($_SESSION['scriptcase']['treemenu_home']['glo_nm_usa_grupo'] == "S")
{
    $path_apls     = substr($path_apls, 0, strrpos($path_apls, '/'));
}
$path_apls     .= "/";
include("../_lib/lang/". $this->str_lang .".lang.php");
include("../_lib/css/" . $this->str_schema_all . "_menuT.php");
if(isset($pagina_schemamenu) && !empty($pagina_schemamenu) && is_file("../_lib/menuicons/". $pagina_schemamenu .".php"))
{
    include("../_lib/menuicons/". $pagina_schemamenu .".php");
}
include("../_lib/lang/config_region.php");
include("../_lib/lang/lang_config_region.php");
$this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
$this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
$this->nm_data = new nm_data("en_us");
if(isset($this->Ini->Nm_lang))
{
    $Nm_lang = $this->Ini->Nm_lang;
}
else
{
    $Nm_lang = $this->Nm_lang;
}
$Str_btn_menu = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
$Str_btn_css  = trim($str_button) . "/" . trim($str_button) . ".css";
include($path_btn . $Str_btn_menu);
if (!function_exists("nmButtonOutput"))
{
   include_once("../_lib/lib/php/nm_gp_config_btn.php");
}
asort($this->Nm_lang_conf_region);
$this->tab_grupo[0] = "PHPTrn/";
if ($_SESSION['scriptcase']['treemenu_home']['glo_nm_usa_grupo'] != "S")
{
    $this->tab_grupo[0] = "";
}

    $_SESSION['scriptcase']['menu_atual'] = "treemenu_home";
    $_SESSION['scriptcase']['menu_apls']['treemenu_home'] = array();
    if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
    {
        foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
        {
            if (isset($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao']) && $_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao'] == $NM_con_orig)
            {
/*NM*/          $_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao'] = $NM_con_dest;
            }
            if (isset($_SESSION['scriptcase']['treemenu_home']['glo_nm_perfil']) && $_SESSION['scriptcase']['treemenu_home']['glo_nm_perfil'] == $NM_con_orig)
            {
/*NM*/          $_SESSION['scriptcase']['treemenu_home']['glo_nm_perfil'] = $NM_con_dest;
            }
            if (isset($_SESSION['scriptcase']['treemenu_home']['glo_con_' . $NM_con_orig]))
            {
                $_SESSION['scriptcase']['treemenu_home']['glo_con_' . $NM_con_orig] = $NM_con_dest;
            }
        }
    }
$_SESSION['scriptcase']['charset'] = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
ini_set('default_charset', $_SESSION['scriptcase']['charset']);
$_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_conf_reg[$this->str_conf_reg][$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
foreach ($this->Nm_lang as $ind => $dados)
{
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
    {
        $ind = mb_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
        $this->Nm_lang[$ind] = $dados;
    }
    if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
    {
        $this->Nm_lang[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
    }
}
if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
{
    $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
}
$this->regionalDefault();
$this->str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_gray_shop/sc_gray_shop";
$_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
$_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
$_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
if (is_dir($path_img_old))
{
    $Res_dir_img = @opendir($path_img_old);
    if ($Res_dir_img)
    {
        while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
        {
           $Str_arquivo = "/" . $Str_arquivo;
           if (@is_file($path_img_old . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_img_old . $Str_arquivo)
           {
               @unlink($path_img_old . $Str_arquivo);
           }
        }
    }
    @closedir($Res_dir_img);
    rmdir($path_img_old);
}
//
if (!empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (!empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
         $$nmgp_var           = $nmgp_val;
    }
}
if (isset($script_case_init))
{
    $_SESSION['sc_session'][1]['treemenu_home']['init'] = $script_case_init;
}
elseif (!isset($_SESSION['sc_session'][1]['treemenu_home']['init']))
{
    $_SESSION['sc_session'][1]['treemenu_home']['init'] = "";
}
$script_case_init = $_SESSION['sc_session'][1]['treemenu_home']['init'];
if (isset($nmgp_parms) && !empty($nmgp_parms)) 
{ 
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todo = explode("?@?", $nmgp_parms);
    $ix = 0;
    while (!empty($todo[$ix]))
    {
       $cadapar = explode("?#?", $todo[$ix]);
       $$cadapar[0] = $cadapar[1];
       $_SESSION[$cadapar[0]] = $cadapar[1];
       $ix++;
     }
} 
$this->sc_Include($path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
include_once($path_adodb . "/adodb.inc.php"); 
$this->sc_Include($path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
 if(function_exists('set_php_timezone')) set_php_timezone('treemenu_home'); 
perfil_lib($path_libs);
if (!isset($_SESSION['sc_session'][1]['SC_Check_Perfil']))
{
    if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($path_libs, $_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod']);
    $_SESSION['sc_session'][1]['SC_Check_Perfil'] = true;
}
$nm_falta_var    = ""; 
$nm_falta_var_db = ""; 
if (isset($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao']))
{
    db_conect_devel($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'], 'PHPTrn', 2); 
}
if (isset($_SESSION['scriptcase']['treemenu_home']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['treemenu_home']['glo_nm_perfil']))
{
   $_SESSION['scriptcase']['glo_perfil'] = $_SESSION['scriptcase']['treemenu_home']['glo_nm_perfil'];
}
if (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = "";
    carrega_perfil($_SESSION['scriptcase']['glo_perfil'], $path_libs, "S");
    if (empty($_SESSION['scriptcase']['glo_senha_protect']))
    {
        $nm_falta_var .= "Perfil=" . $_SESSION['scriptcase']['glo_perfil'] . "; ";
    }
}
if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
{
    $nm_falta_var_db .= "glo_tpbanco; ";
}
else
{
    $nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
}
if (!isset($_SESSION['scriptcase']['glo_servidor']))
{
    $nm_falta_var_db .= "glo_servidor; ";
}
else
{
    $nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
}
if (!isset($_SESSION['scriptcase']['glo_banco']))
{
    $nm_falta_var_db .= "glo_banco; ";
}
else
{
    $nm_banco = $_SESSION['scriptcase']['glo_banco']; 
}
if (!isset($_SESSION['scriptcase']['glo_usuario']))
{
    $nm_falta_var_db .= "glo_usuario; ";
}
else
{
    $nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
}
if (!isset($_SESSION['scriptcase']['glo_senha']))
{
    $nm_falta_var_db .= "glo_senha; ";
}
else
{
    $nm_senha = $_SESSION['scriptcase']['glo_senha']; 
}
$nm_con_db2 = array();
$nm_database_encoding = "";
if (isset($_SESSION['scriptcase']['glo_database_encoding']))
{
    $nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
{
    $nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
{
    $nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
{
    $nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
{
    $nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
}
if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
{
    $nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
}
$nm_con_persistente = "";
$nm_con_use_schema  = "";
if (isset($_SESSION['scriptcase']['glo_use_persistent']))
{
    $nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
}
if (isset($_SESSION['scriptcase']['glo_use_schema']))
{
    $nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
}
if (!empty($nm_falta_var) || !empty($nm_falta_var_db))
{
    if (empty($nm_falta_var_db))
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
        echo "  " . $nm_falta_var;
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    else
    {
        echo "<table width=\"80%\"  border=\"1\" height=\"117\">";
        echo "<tr>";
        echo "   <td class=\"css_menu_sel\">";
        echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font>";
        echo "   </b></td>";
        echo " </tr>";
        echo "</table>";
    }
    if (isset($_SESSION['scriptcase']['nm_ret_exec']) && '' != $_SESSION['scriptcase']['nm_ret_exec'])
    { 
        if (isset($_SESSION['sc_session'][1]['treemenu_home']['sc_outra_jan']) && $_SESSION['sc_session'][1]['treemenu_home']['sc_outra_jan'])
        {
            echo "<a href='javascript:window.close()'><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
        else 
        { 
            echo "<a href='" . $_SESSION['scriptcase']['nm_ret_exec'] . "><img border='0' src='" . $path_imag_cab . "/scriptcase__NM__exit.gif' title='" . $this->Nm_lang['lang_btns_menu_rtrn_hint'] . "' align=absmiddle></a> \n" ; 
        } 
    } 
    exit ;
} 
if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
{
    $nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
{
    $nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
}
if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
{
    $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
}
$sc_tem_trans_banco = false;
$this->nm_bases_access    = array("access", "ado_access");
$this->nm_bases_db2       = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6");
$this->nm_bases_ibase     = array("ibase", "firebird", "borland_ibase");
$this->nm_bases_informix  = array("informix", "informix72", "pdo_informix");
$this->nm_bases_mssql     = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv");
$this->nm_bases_mysql     = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
$this->nm_bases_postgres  = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
$this->nm_bases_oracle    = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle");
$this->nm_bases_sqlite    = array("sqlite", "sqlite3", "pdosqlite");
$this->nm_bases_sybase    = array("sybase");
$this->nm_bases_vfp       = array("vfp");
$this->nm_bases_odbc      = array("odbc");
$_SESSION['scriptcase']['sc_num_page'] = 1;
$_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1DcXOZSFGD1BOVWJeHgvOVIFCDWFYHMraHQNmZ1BiHAN7HuB/DErKVkJGDWFqHMJsHQNmH9FGHAveHuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAvCZMFaHgBOHErsDWBmZuJeHQXOZ9JeZ1zGV5BODMvsVcBUDWXKVENUHQNwZkFUZ1vOZMJeHgveHErsDWF/HIX7HQXOZ9JeZ1zGV5BODMrYVcFeDWF/HMFUHQNmZkFUZ1rYHQBiHgBYHArsDuXKZuJeHQXODuFaHAveD5NUHgNKDkBOV5FYHMBiDcJUH9FaHIBeHQF7DEBeZSJGDWr/HMX7D9NmDuFaHABYHuXGDMNOVcFeV5X7HMrqHQBiZ1BODSNOHQJwDEBODkFeH5FYVoFGHQJKDQJsD1veD5JwHuNOVcBOV5X7HMBiD9BsVIraD1rwV5X7HgBeHEFKV5FaZuFaD9NwH9X7HABYD5JwHuNOVcBODWFYDoJsD9BiZ1BOZ1BeV5XGDEBOZSXeV5FqVoB/HQXGH9FGHAveD5BOHuzGVcFeDWXCDoJsDcBwH9B/Z1rYHQJwDErKHEXeHEFaVoJwDcXGDQFGHAvOVWBqHuNOV9BUH5FqHMJwHQNwH9FaDSrYD5NUHgNKHErsH5FYHMX7HQXODuFaHAveD5NUHgNKDkBOV5FYHMBiHQBiZkBiDSNOHQBqHgBODkB/DWXCHIJwHQNmDuBOZ1BYHQJsHgvOVcFeDWXKVENUHQBsVIraZ1rYHQJeHgBYHErCHEXCHIB/HQFYZ9rqZ1BYHQrqHgvOVcXKDuX7HMFaHQXOVIJwD1rwV5FGDEBeHEXeH5X/DoF7HQNwDQBqDSN7HQJwDMvsVcXKDWF/HIrqHQBiZ1FUZ1rYHQNUHgvsHErsDWFqHIrqDcXGZ9rqZ1BYHQXGHgvOV9BUDuX7HIrqHQXGZkFUZ1rYHQFaHgrKHErCDWB3ZuXGHQNmDuBOD1BeD5rqHuvmVcBOH5B7VoBqHQXOZkBiDSvmZMBqHgvsHArCV5FqHMJwDcXGZ9JeZ1BYHuXGDMvsVcXKHEF/HINUDcFYVIJwZ1vOD5JeDMvCHENiDuJeHMBqDcBiZ9JeZ1BYHuBODMvmVIBsDuX7HMX7HQBsVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuzGVcFKDWFaVENUD9JmZ1X7Z1BeHQX7HgBYDkFeV5FaVoFaDcBwDQFGHAN7D5JwHuNOVcFKV5X7VorqD9BsZ1B/HArYV5FUDEvsHEFKV5FqHMJsHQNwDQB/HAveHQNUDMBOVIBsV5BmVoraD9XOH9FaHAN7D5rqHgvCDkB/DWFqDoFUDcBwDQJsHABYVWJeHgrYDkFCH5XCVoraD9BsH9B/HIrwD5JeHgvCZSJGH5FYDoF7D9NwH9X7DSBYV5JeHuBYVcFKH5FqVoB/D9XOH9B/D1zGD5FaDEvsZSJGDuFaZuBqD9NwH9X7Z1rwV5JwHuBYVcFiV5X7VoFGDcBqH9FaHAN7V5JeDErKHEBUH5F/DoF7DcJeDQFGD1BeD5JwDMrwZSJ3H5FqDoJeD9JmZ1B/D1NaD5rqDErKZSXeH5FYDoFUD9JKDQJsZ1rwV5BqHuBYVcXKV5X7HIFGD9BsZ1F7HArYHuJwDErKVkXeV5FaHIJwD9NwZSFGHABYV5BqDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5XGHgveHErsDWFGZuB/HQBiDQBqHINaV5XGDMvsV9FeDWXCDoJsDcBwH9B/Z1rYHQJwDEBOHEJqHEXCDoJeHQJeDQFaHANOVWXGDMrYVcFKDWBmVErqDcBqZSBqHArKV5FUDMrYZSXeV5FqHIJsDcBwDQJsHABYD5F7HuNODkBsDWXCDoJsDcBwH9B/Z1rYHQJwHgBYHEFKV5B3DoBO";
 $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao']))
{ 
   $this->Db = db_conect_devel($_SESSION['scriptcase']['treemenu_home']['glo_nm_conexao'], $str_root . $_SESSION['scriptcase']['treemenu_home']['glo_nm_path_prod'], 'PHPTrn'); 
} 
else 
{ 
   $this->Db = db_conect($nm_tpbanco, $nm_servidor, $nm_usuario, $nm_senha, $nm_banco, $glo_senha_protect, "S", $nm_con_persistente, $nm_con_db2, $nm_database_encoding); 
} 
$this->nm_tpbanco = $nm_tpbanco; 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_ibase) && function_exists('ibase_timefmt'))
{
    ibase_timefmt('%Y-%m-%d %H:%M:%S');
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_sybase))
{
   $this->Db->fetchMode = ADODB_FETCH_BOTH;
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_mssql))
{
   $this->Db->Execute("set dateformat ymd");
} 
if (in_array(strtolower($nm_tpbanco), $this->nm_bases_oracle))
{
   $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
   $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
} 
//
if ((isset($nmgp_outra_jan) && $nmgp_outra_jan == "true") || (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'treemenu_home'))
{
    $_SESSION['sc_session'][1]['treemenu_home']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
    $_SESSION['scriptcase']['sc_saida_treemenu_home'] = "javascript:window.close()";
}

/* Menu configuration variables */
$treemenu_home_menuData['iframe'] = TRUE;

$treemenu_home_menuData['height'] = '100%';
if (!isset($_SESSION['scriptcase']['sc_apl_seg']))
{
    $_SESSION['scriptcase']['sc_apl_seg'] = array();
}
$sc_teste_seg = file($path_apls . $this->tab_grupo[0] . SC_dir_app_name("container") . "/container_ini.txt");
if ((!isset($sc_teste_seg[3]) || trim($sc_teste_seg[3]) == "NAO") || (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N")) 
{
    if (!isset($_SESSION['scriptcase']['sc_apl_seg']['container']))
    {
        $_SESSION['scriptcase']['sc_apl_seg']['container'] = "on";
    }
}
if (isset($_SESSION['nm_session']['user']['sec']['flag']) && $_SESSION['nm_session']['user']['sec']['flag'] == "N") 
{ 
    $_SESSION['scriptcase']['sc_apl_seg']['container'] = "on";
} 
$_SESSION['scriptcase']['treemenu_home']['contr_erro'] = 'on';
if (!isset($_SESSION['v_cat_destaq'])) {$_SESSION['v_cat_destaq'] = "";}
if (!isset($this->sc_temp_v_cat_destaq)) {$this->sc_temp_v_cat_destaq = (isset($_SESSION['v_cat_destaq'])) ? $_SESSION['v_cat_destaq'] : "";}
if (!isset($_SESSION['v_cat'])) {$_SESSION['v_cat'] = "";}
if (!isset($this->sc_temp_v_cat)) {$this->sc_temp_v_cat = (isset($_SESSION['v_cat'])) ? $_SESSION['v_cat'] : "";}
 $str_where = "";
$this->sc_temp_v_cat_destaq = "";
if(isset($_POST['nmgp_parms']) && substr($_POST['nmgp_parms'], 0, 5)=="v_cat" && isset($this->sc_temp_v_cat) && !empty($this->sc_temp_v_cat))
{
  $str_where = " WHERE cat.categoryid = " . $this->sc_temp_v_cat;
   unset($_SESSION['v_cat']);
 unset($this->sc_temp_v_cat);
;
  $this->sc_temp_v_cat_destaq = $this->sc_temp_v_cat;
}

unset($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"]);
if (!isset($_SESSION['scriptcase']['sc_def_menu']))
{
    $_SESSION['scriptcase']['sc_def_menu'] = array();
}
if (!isset($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"]))
{
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"] = array();
}
$sql = "SELECT DISTINCT
                 cat.categoryid,
                 cat.description,
				 cat.list_order
              FROM
                 category cat INNER JOIN products prod ON cat.categoryid = prod.categoryid ". $str_where;
$sql .= " ORDER BY cat.list_order";

 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

foreach($this->rs  as $cat)
{
  $id = md5($cat[1]);
  if (isset($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"]))
{
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]                   = array();
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['pai']            = "";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['label']          = $cat[1];
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['link']           = "grid_products_list_cat";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['parm']           = "v_category*scin" . $cat[0] . "*scout" . "nm_run_menu*scin1*scout";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['icon']           = "";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['hint']           = "";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['target']         = "_self";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['name']           = "grid_products_list_cat";
    $Temp_url = "grid_products_list_cat";
    if ('http://' == substr($Temp_url, 0, 7) || 'https://' == substr($Temp_url, 0, 8) || '../' == substr($Temp_url, 0, 3) || '/' == substr($Temp_url, 0, 1))
    {
        $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['lnk_url'] = true;
    }
    else
    {
        $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['lnk_url'] = false;
        if (!empty($Temp_url))
        {
            $Temp_url = SC_dir_app_name($Temp_url) . "/" . $Temp_url . ".php";
            if (strtolower($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['target']) == '_blank')
            {
                $Temp_url .= "?nmgp_outra_jan=true&nm_apl_menu=" . "treemenu_home" . "&script_case_session=" . session_id();
            }
            if (strtolower($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['target']) == '_self')
            {
                $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['sc_init'] = $this->Gera_sc_init('grid_products_list_cat');
                $Temp_url .= "?nm_run_menu=1&nm_apl_menu=" . "treemenu_home" . "&script_case_init=" . $this->Gera_sc_init('grid_products_list_cat') . "&script_case_session=" . session_id();
            }
            if (strtolower($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['target']) == '_parent')
            {
                $Temp_url .= "?nm_run_menu=1&script_case_init=" . $_SESSION['sc_session'][1]["treemenu_home"]['init'] . "&script_case_session=" . session_id();
            }
        }
    }
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id]['url'] = $Temp_url;
}
$nm_select = "
                 SELECT
                    subc.subcategoryid,
                    subc.description
                 FROM
                    subcategory subc INNER JOIN products prod ON subc.categoryid = prod.categoryid AND subc.subcategoryid = prod.subcategoryid
                 WHERE 
                    (subc.categoryid = ". $cat[0] .")
                 ORDER BY
                    subc.list_order
                  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs1 = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs1[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs1 = false;
          $this->rs1_erro = $this->Db->ErrorMsg();
      } 
;
                  
  if(isset($this->rs1[0][0]))
  {
    foreach($this->rs1  as $subcat)
    {
      $id1 = md5($subcat[0]);
      if (isset($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"]))
{
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]                   = array();
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['pai']            = $id;
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['label']          = $subcat[1];
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['link']           = "grid_products_list_subcat";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['parm']           = "v_category*scin" . $cat[0] . "*scout" . "v_subcategory*scin" . $subcat[0] . "*scout" . "nm_run_menu*scin1*scout";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['icon']           = "";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['hint']           = "";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['target']         = "_self";
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['name']           = "grid_products_list_subcat";
    $Temp_url = "grid_products_list_subcat";
    if ('http://' == substr($Temp_url, 0, 7) || 'https://' == substr($Temp_url, 0, 8) || '../' == substr($Temp_url, 0, 3) || '/' == substr($Temp_url, 0, 1))
    {
        $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['lnk_url'] = true;
    }
    else
    {
        $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['lnk_url'] = false;
        if (!empty($Temp_url))
        {
            $Temp_url = SC_dir_app_name($Temp_url) . "/" . $Temp_url . ".php";
            if (strtolower($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['target']) == '_blank')
            {
                $Temp_url .= "?nmgp_outra_jan=true&nm_apl_menu=" . "treemenu_home" . "&script_case_session=" . session_id();
            }
            if (strtolower($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['target']) == '_self')
            {
                $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['sc_init'] = $this->Gera_sc_init('grid_products_list_subcat');
                $Temp_url .= "?nm_run_menu=1&nm_apl_menu=" . "treemenu_home" . "&script_case_init=" . $this->Gera_sc_init('grid_products_list_subcat') . "&script_case_session=" . session_id();
            }
            if (strtolower($_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['target']) == '_parent')
            {
                $Temp_url .= "?nm_run_menu=1&script_case_init=" . $_SESSION['sc_session'][1]["treemenu_home"]['init'] . "&script_case_session=" . session_id();
            }
        }
    }
    $_SESSION['scriptcase']['sc_def_menu']["treemenu_home"][$id1]['url'] = $Temp_url;
}
}
  }
  
}
if (isset($this->sc_temp_v_cat)) {$_SESSION['v_cat'] = $this->sc_temp_v_cat;}
if (isset($this->sc_temp_v_cat_destaq)) {$_SESSION['v_cat_destaq'] = $this->sc_temp_v_cat_destaq;}
$_SESSION['scriptcase']['treemenu_home']['contr_erro'] = 'off';
if ($this->Db)
{
    $this->Db->Close(); 
}
/* JS files */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?> style="height: 100%">
<head>
 <title>treemenu_home</title>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <?php
 if ($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
 {
  ?>
   <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' />
  <?php
 }
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $url_third; ?>/jquery_plugin/vakata-jstree-e22db21/themes/default/style.min.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuT.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->str_schema_all ?>_menuT<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $Str_btn_css ?>" /> 
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery/js/jquery.js"></script>
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery/js/jquery-ui.js"></script>
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery_plugin/vakata-jstree-e22db21/jstree.min.js"></script>
<script  type="text/javascript" src="<?php echo $url_third; ?>/jquery_plugin/layout/jquery.layout.js"></script>
<style>
  li.jstree-open   > a .jstree-icon { background:url(../_lib/img/tree_folder_open.png)  ; background-position: center center; background-size: auto auto; background-repeat: no-repeat;}
  li.jstree-closed > a .jstree-icon { background:url(../_lib/img/tree_folder_closed.png); background-position: center center; background-size: auto auto; background-repeat: no-repeat;}
  li.jstree-leaf   > a .jstree-icon { background:url(../_lib/img/tree_leaf.png); background-position: center center; background-size: auto auto; background-repeat: no-repeat;}
</style>
</head>
<body style="height: 100%" scroll="no" class='scMenuTPage'>
<?php
$str_bmenu = nmButtonOutput($this->arr_buttons, "bmenu", "showMenu();", "showMenu();", "bmenu", "", "" . $this->Nm_lang['lang_btns_menu'] . "", "position:absolute; top:4px; left:2px;z-index:9999;", "absmiddle", "", "0px", $this->path_botoes, "", "" . $this->Nm_lang['lang_btns_menu_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "");
if($_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
    $menu_mobile_hide          = $mobile_menu_mobile_hide;
    $menu_mobile_inicial_state = $mobile_menu_mobile_inicial_state;
    $menu_mobile_hide_onclick  = $mobile_menu_mobile_hide_onclick;
    $menutree_mobile_float     = $mobile_menutree_mobile_float;
    $menu_mobile_hide_icon     = $mobile_menu_mobile_hide_icon;
}
$str_menu_display = 'false';
$str_menu_display_float = false;
if($menu_mobile_hide == 'S')
{
    if($menu_mobile_inicial_state =='escondido')
    {
            $str_menu_display='true';
            $str_btn_display="show";
    }
    else
    {
            $str_menu_display='false';
            $str_btn_display="hide";
    }
    if($menu_mobile_hide_icon != 'S')
    {
        $str_btn_display="show";
    }
?>
<script>
    $( document ).ready(function() {
        $('#bmenu').<?php echo $str_btn_display; ?>();
        <?php
        if($menu_mobile_hide_icon != 'S')
        {
            ?>
            $('#css3menut').css('margin-top', $('#bmenu').outerHeight());

            <?php
        }
        ?>
        $('#bmenu').css('left', '0px');
        $('#bmenu').css('top', $('.scMenuTHeader').height());
    });
    function showMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').hide();
      <?php
      }
      ?>
            myLayout.toggle('west');
    }
    function HideMenu()
    {
      <?php
      if($menu_mobile_hide_icon == 'S')
      {
      ?>
                $('#bmenu').show();
      <?php
      }
      ?>
            myLayout.toggle('west');
    }
</script>
<?php
echo $str_bmenu;
}
?>
<?php 
        $NM_scr_iframe = (isset($_POST['hid_scr_iframe'])) ? $_POST['hid_scr_iframe'] : "";   
?> 

        <script  type="text/javascript">

                var myLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method

                $(document).ready(function () {
                                        myLayout = $('body').layout({
                                         west__size                 : 255
                                        ,west__showOverflowOnHover : false
                                        ,east__showOverflowOnHover : false
                    ,north__slidable           : false
                    ,north__resizable          : false
                    ,north__closable           : false
                    ,north__spacing_open       : 0
                    ,north__spacing_closed     : 0
                    ,south__slidable           : false
                    ,south__resizable          : false
                    ,south__closable           : false
                    ,south__spacing_open       : 0
                    ,south__spacing_closed     : 0
                    ,west__resizable           : false
                    ,west__spacing_open        : 0
                    ,west__spacing_closed      : 0
                    ,east__resizable           : false
                    ,east__spacing_open        : 0
                    ,east__spacing_closed      : 0
                                        ,west__initClosed          : <?php echo $str_menu_display; ?>
                                        ,east__initClosed          : <?php echo $str_menu_display; ?>

                    
                                        });
                                        $('#css3menut').jstree().on("select_node.jstree",function(e, data) {
                                          str_link   = '';
                                          str_target = '';
                                          if(data.instance.is_leaf(data.node))
                                          {
                                                str_link   = data.node.a_attr.href;
                                                str_target = data.node.a_attr.target;
                                          }
                                          else
                                          {
                                                data.instance.toggle_node(data.node);
                                                str_link   = $('#' + data.node.id + ' a span a').attr('href');
                                                str_target = $('#' + data.node.id + ' a span a').attr('target');
                                          }

                                          //test link type
                                          if(str_link != '' && str_target != '')
                                          {
                                                  if(str_link.substring(0, 11) == 'javascript:')
                                                  {
                                                        eval(str_link.substring(11));
                                                  }
                                                  else if(str_link != '#')
                                                  {
                                                        if(str_target == '_parent')
                                                        {
                                                                str_target = '_self';
                                                        }
                                                        window.open(str_link, str_target);
                                                  }
                                                  <?php
                                                  if($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick=='S')
                                                  {
                                                  ?>
                                                                HideMenu();
                                                  <?php
                                                  }
                                                  ?>
                                          }
                                        });
                                        $('#css3menut').jstree().open_all();
                 });
    </script>
<script type="text/javascript">
var numl = 0;
var toBeHidden = 0;
function NM_show_menu()
{
   return true;
}
function NM_hide_menu()
{
   return true;
}
</script>

<style type="text/css">

        .ui-layout-pane { /* all 'panes' */
                        border: 0px solid #BBB;
                        padding: 0px;
                        overflow: auto;
        }
        .ui-layout-resizer { /* all 'resizer-bars' */
                        background: #DDD;
        }

        .ui-layout-toggler { /* all 'toggler-buttons' */
                        background: #AAA;
        }
        </style>
<?php


$saida_apl = $_SESSION['scriptcase']['sc_saida_treemenu_home'];
$treemenu_home_menuData['data'] = array();

if (isset($_SESSION['scriptcase']['sc_def_menu']['treemenu_home']))
{
    $arr_menu_usu = $this->nm_arr_menu_recursiv($_SESSION['scriptcase']['sc_def_menu']['treemenu_home']);
    $this->nm_gera_menus($str_menu_usu, $arr_menu_usu, 1, 'treemenu_home');
    $treemenu_home_menuData['data'] = $str_menu_usu;
}
if (is_file("treemenu_home_help.txt"))
{
    $Arq_WebHelp = file("treemenu_home_help.txt"); 
    if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
    {
        $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
        $Tmp = explode(";", $Arq_WebHelp[0]); 
        foreach ($Tmp as $Cada_help)
        {
            $Tmp1 = explode(":", $Cada_help); 
            if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "menu" && is_file($str_root . $path_help . $Tmp1[1]))
            {
                $str_icon = "";
                $icon_aba = "";
                $icon_aba_inactive = "";
                if(empty($icon_aba) && isset($arr_menuicons['']['active']))
                {
                    $icon_aba = $arr_menuicons['']['active'];
                }
                if(empty($icon_aba_inactive) && isset($arr_menuicons['']['inactive']))
                {
                    $icon_aba_inactive = $arr_menuicons['']['inactive'];
                }
                if(empty($icon_aba) && !empty($icon_aba_inactive))
                {
                    $icon_aba = $icon_aba_inactive;
                }
                if(empty($icon_aba_inactive) && !empty($icon_aba))
                {
                    $icon_aba_inactive = $icon_aba;
                }
                $treemenu_home_menuData['data'][] = array(
                    'label'    => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'level'    => "0",
                    'link'     => "" . $path_help . $Tmp1[1] . "",
                    'hint'     => "" . $this->Nm_lang['lang_btns_help_hint'] . "",
                    'id'       => "item_Help",
                    'icon'     => $str_icon,
                    'icon_aba' => $icon_aba,
                    'icon_aba_inactive' => $icon_aba_inactive,
                    'target'   => "" . $this->treemenu_home_target('_blank') . "",
                    'sc_id'    => "item_Help",
                    'disabled' => "N",
                );
            }
        }
    }
}

if (isset($_SESSION['scriptcase']['sc_menu_del']['treemenu_home']) && !empty($_SESSION['scriptcase']['sc_menu_del']['treemenu_home']))
{
    $nivel = 0;
    $exclui_menu = false;
    foreach ($treemenu_home_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_del']['treemenu_home']))
       {
          $nivel = $cada_menu['level'];
          $exclui_menu = true;
          unset($treemenu_home_menuData['data'][$i_menu]);
       }
       elseif ( empty($cada_menu) || ($exclui_menu && $nivel < $cada_menu['level']))
       {
          unset($treemenu_home_menuData['data'][$i_menu]);
       }
       else
       {
          $exclui_menu = false;
       }
    }
    $Temp_menu = array();
    foreach ($treemenu_home_menuData['data'] as $i_menu => $cada_menu)
    {
        $Temp_menu[] = $cada_menu;
    }
    $treemenu_home_menuData['data'] = $Temp_menu;
}

if (isset($_SESSION['scriptcase']['sc_menu_disable']['treemenu_home']) && !empty($_SESSION['scriptcase']['sc_menu_disable']['treemenu_home']))
{
    $disable_menu = false;
    foreach ($treemenu_home_menuData['data'] as $i_menu => $cada_menu)
    {
       if (in_array($cada_menu['id'], $_SESSION['scriptcase']['sc_menu_disable']['treemenu_home']))
       {
          $nivel = $cada_menu['level'];
          $disable_menu = true;
          $treemenu_home_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu) && $disable_menu && $nivel < $cada_menu['level'])
       { 
          $treemenu_home_menuData['data'][$i_menu]['disabled'] = 'Y';
       }
       elseif (!empty($cada_menu))
       {
          $disable_menu = false;
       }
    }
}

$Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
$Lim   = strlen($Str_date);
$Ult   = "";
$Arr_D = array();
for ($I = 0; $I < $Lim; $I++)
{
    $Char = substr($Str_date, $I, 1);
    if ($Char != $Ult)
    {
        $Arr_D[] = $Char;
    }
    $Ult = $Char;
}
$Prim = true;
$Str  = "";
foreach ($Arr_D as $Cada_d)
{
    $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
    $Str .= $Cada_d;
    $Prim = false;
}
$Str = str_replace("a", "Y", $Str);
$Str = str_replace("y", "Y", $Str);
$nm_data_fixa = date($Str); 
?>
<?php
    $link_default = "";
    if (isset($_SESSION['scriptcase']['sc_apl_seg']['container']) && $_SESSION['scriptcase']['sc_apl_seg']['container'] == "on") 
    { 
    $_SESSION['scriptcase']['treemenu_home']['apl_inicial'] = "";
    $link_default = " onclick=\"openMenuItem('iframe_treemenu_home');\" item-href=\"treemenu_home_form_php.php?sc_item_menu=treemenu_home&sc_apl_menu=container&sc_apl_link=" . urlencode($treemenu_home_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['treemenu_home']['glo_nm_usa_grupo'] . "\"  item-target=\"treemenu_home_iframe\"";
    } 
    else
    { 
        $_SESSION['scriptcase']['treemenu_home']['apl_inicial'] = ($NM_scr_iframe != "") ? $NM_scr_iframe : "treemenu_home_pag_ini.php";
    } 
    $_SESSION['scriptcase']['treemenu_home']['path_link'] = $path_link;
?>
<div class="ui-layout-west">
<table cellspacing=0 cellpadding=0 class="scMenuTTable" style="height: 100%; width: 100%">
    <tr class="scMenuTTable">
        <td class="scMenuTItem scMenuTTableM" valign="top">
                <table cellpadding=0 cellspacing=0>
                    <tr>
                            <td>
                      <?php
                      echo $this->treemenu_home_escreveMenu($treemenu_home_menuData['data']);
                      ?>
                            </td>
                    </tr>
                </table>
        </td>
      </tr>
    </table>
</div>
<div class="ui-layout-center">
  <table cellspacing=0 cellpadding=0 style="height: 100%; width: 100%" cellpadding=0 cellspacing=0>
    <tr>
      
        <td style="border: 0px; height: 100%; width: 100%; padding: 0px">
        <iframe name="treemenu_home_iframe" id="iframe_treemenu_home" frameborder="0" class="scMenuIframe" src="<?php echo $_SESSION['scriptcase']['treemenu_home']['apl_inicial']?>"<?php echo $link_default ?>></iframe>
      </tr>
    </table>
</div>
<script type="text/javascript">
 function nm_out_menu(link)
 {
    if (link == 'javascript:window.close()')
    {
        window.close();
    }
    else
    {
        window.location = (link);
    }
 }
Iframe_atual = "treemenu_home_iframe";
Tab_links = new Array();
<?php
echo "Tab_links['treemenu_home']   = \"\";\r\n";
 foreach ($treemenu_home_menuData['data'] as $ind => $dados_menu)
 {
     if ($dados_menu['link'] != "#")
     {
         echo "Tab_links['" . $dados_menu['id'] . "']   = \"\";\r\n";
     }
}
?>
function openMenuItem(str_id)
{
    str_link   = $('#' + str_id).attr('item-href');
    str_target = $('#' + str_id).attr('item-target');
    str_id = str_id.replace('iframe_treemenu_home', 'treemenu_home');
    //test link type
    if (str_link != '' && str_link != '#')
    {
        if (str_link.substring(0, 11) == 'javascript:')
        {
            eval(str_link.substring(11));
        }
        else if (str_link != '#' && str_target != '_parent')
        {
            window.open(str_link, str_target);
        }
        else if (str_link != '#' && str_target == '_parent')
        {
            document.location = str_link;
        }
        <?php
        if ($menu_mobile_hide == 'S' && $menu_mobile_hide_onclick == 'S')
        {
        ?>
            HideMenu();
        <?php
        }
        ?>
    }
}
function writeFastMenu(arr_link)
{
    var link_ok = "";
    for (i = 0; i < arr_link.length; i++) 
    {
        if (link_ok != "")
        {
            link_ok += "<img src='<?php echo $path_imag_cab . "/" . $this->breadcrumbline_separator; ?>'>";
        }
        link_ok += arr_link[i].replace(/#NMIframe#/g, Iframe_atual);
    }
    document.getElementById('links_apls_itens').innerHTML = link_ok;
    document.getElementById('links_apls').style.display = '';
}
function clearFastMenu()
{
    document.getElementById('links_apls_itens').innerHTML = '';
    document.getElementById('links_apls').style.display = 'none';
}
<?php
if (isset($link_default) && !empty($link_default))
{
    echo "   document.getElementById('iframe_treemenu_home').click();\r\n";
}
?>
</script>
</body>
</html>
<?php
}
/* Target control */
function treemenu_home_escreveMenu($arr_menu)
{
    $aMenuItemList = array();
    foreach ($arr_menu as $ind => $resto)
    {
        $aMenuItemList[] = $resto;
    }
?>
<div id="css3menut">
    <ul>
        <?php
            for ($i = 0; $i < sizeof($aMenuItemList); $i++) {
            ?>
            
            <?php
                if ('' != $aMenuItemList[$i]['icon'] && file_exists($this->path_imag_apl . "/" . $aMenuItemList[$i]['icon'])) {
                    $iconHtml = 'data-jstree=\'{ "icon" : "../_lib/img/'. $aMenuItemList[$i]['icon'] .'" }\'';
                }
                else {
                    $iconHtml = '';
                }
                $sDisabledClass = '';
                if ('Y' == $aMenuItemList[$i]['disabled']) {
                    $aMenuItemList[$i]['link']   = '#';
                    $aMenuItemList[$i]['target'] = '';
                    $sDisabledClass               = 0 == $aMenuItemList[$i]['level'] ? ' scMenuTItemDisabled' : ' scMenuTSubItemDisabled';
                }
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level']) {
                  if ($aMenuItemList[$i]['link'] == '#')
                  {
                  ?>
                     <li <?php echo $iconHtml; ?>><span class="scMenuTItems<?php echo $sDisabledClass; ?>"><?php echo $aMenuItemList[$i]['label']; ?></span><ul>
                  <?php
                  }
                  else
                  {
                  ?>
                     <li <?php echo $iconHtml; ?>><span class="scMenuTItems scMenuTItem"><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"<?php echo $aMenuItemList[$i]['target']; ?> class="scMenuTItem"><?php echo $aMenuItemList[$i]['label']; ?></a></span><ul>
                  <?php
                  }
                }
                else
                {
                  if ($aMenuItemList[$i]['link'] == '#')
                  {
                    ?>
                    <li <?php echo $iconHtml; ?> class="scMenuTItems<?php echo $sDisabledClass; ?>"><a href='#' target=''><?php echo $aMenuItemList[$i]['label']; ?></a>
                    <?php
                  }
                  else
                  {
                    ?>
                    <li <?php echo $iconHtml; ?> class="scMenuTItems scMenuTItem"><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"<?php echo $aMenuItemList[$i]['target']; ?> class="scMenuTItem"><?php echo $aMenuItemList[$i]['label']; ?></a>
                    <?php
                  }
                }
                if ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) {
                ?>
                    </li>
                <?php
                }
                elseif ($aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) {
                ?>
                    </li><?php echo str_repeat('</ul></li>', $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']); ?>
                <?php
                }
                elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0) {
                ?>
                    </li><?php echo str_repeat('</ul></li>', $aMenuItemList[$i]['level']); ?>
                <?php
                }
                elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] == 0) {
                ?>
                    </li>
                <?php
                }
            }
        ?>
    </ul>
</div>
<?php
}
/* Target control */
   function treemenu_home_target($str_target)
   {
       global $treemenu_home_menuData;
       if ('_blank' == $str_target)
       {
           return '_blank';
       }
       elseif ('_parent' == $str_target)
       {
           return '_parent';
       }
       elseif ($treemenu_home_menuData['iframe'])
       {
           return 'treemenu_home_iframe';
       }
       else
       {
           return $str_target;
       }
   }

   function nm_prot_aspas($str_item)
   {
       return str_replace('"', '\"', $str_item);
   }

   function nm_gera_menus(&$str_line_ret, $arr_menu_usu, $int_level, $nome_aplicacao)
   {
       global $treemenu_home_menuData; 
       $str_marg = str_repeat('&nbsp;', 2);
       $str_marg = '';
       foreach ($arr_menu_usu as $arr_item)
       {
           $str_line   = array();
           $str_line['label']    = $this->nm_prot_aspas($arr_item['label']);
           $str_line['level']    = $int_level - 1;
           $str_line['link']     = "";
           $nome_apl = $arr_item['link'];
           $pos = strrpos($nome_apl, "/");
           if ($pos !== false)
           {
               $nome_apl = substr($nome_apl, $pos + 1);
           }
           if ('' != $arr_item['link'])
           {
               if ($arr_item['target'] == '_parent')
               {
                    $str_line['link'] = "javascript:parent.nm_out_menu('treemenu_home_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($treemenu_home_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['treemenu_home']['glo_nm_usa_grupo'] . "')";  
               }
               else
               {
                    $str_line['link'] = "treemenu_home_form_php.php?sc_item_menu=" . $arr_item['id'] . "&sc_apl_menu=" . $nome_apl . "&sc_apl_link=" . urlencode($treemenu_home_menuData['url']['link']) . "&sc_usa_grupo=" . $_SESSION['scriptcase']['treemenu_home']['glo_nm_usa_grupo'] . ""; 
               }
           }
           elseif ($arr_item['target'] == '_parent')
           {
               $str_line['link'] = "javascript:parent.nm_out_menu('" . $_SESSION['scriptcase']['sc_saida_treemenu_home'] . "')"; 
           }
           $str_line['hint']     = ('' != $arr_item['hint']) ? $this->nm_prot_aspas($arr_item['hint']) : '';
           $str_line['id']       = $arr_item['id'];
           $str_line['icon']     = ('' != $arr_item['icon_on']) ? $arr_item['icon_on'] : '';
           $str_line['icon_aba'] = (isset($arr_item['icon_aba']) && !empty($arr_item['icon_aba'])) ? $arr_item['icon_aba'] : '';
           $str_line['icon_aba_inactive'] = (isset($arr_item['icon_aba_inactive']) && !empty($arr_item['icon_aba_inactive'])) ? $arr_item['icon_aba_inactive'] : '';
           if ('' == $arr_item['link'] && $arr_item['target'] == '_parent')
           {
               $str_line['target'] = '_parent';
           }
           else
           {
                $str_line['target'] = ('' != $arr_item['target'] && '' != $arr_item['link']) ?  $this->treemenu_home_target( $arr_item['target']) : "_self"; 
           }
           $str_line['target']   = ' target="' . $str_line['target']  . '" ';
           $str_line['sc_id']    = $arr_item['id'];
           $str_line['disabled'] = "N";
           $str_line_ret[] = $str_line;
           if (!empty($arr_item['menu_itens']))
           {
               $this->nm_gera_menus($str_line_ret, $arr_item['menu_itens'], $int_level + 1, $nome_aplicacao);
           }
       }
   }

   function nm_arr_menu_recursiv($arr, $id_pai = '')
   {
         $arr_return = array();
         foreach ($arr as $id_menu => $arr_menu)
         {
             if ($id_pai == $arr_menu['pai']) 
             {
                 $arr_return[] = array('label'      => $arr_menu['label'],
                                        'link'       => $arr_menu['link'],
                                        'target'     => $arr_menu['target'],
                                        'icon_on'    => $arr_menu['icon'],
                                        'icon_aba'   => $arr_menu['icon_aba'],
                                        'icon_aba_inactive'   => $arr_menu['icon_aba_inactive'],
                                        'hint'       => $arr_menu['hint'],
                                        'id'         => $id_menu,
                                        'menu_itens' => $this->nm_arr_menu_recursiv($arr, $id_menu));
             }
         }
         return $arr_return;
   }
   function Gera_sc_init($apl_menu)
   {
        $_SESSION['scriptcase']['treemenu_home']['sc_init'][$apl_menu] = 1;
        return  1;
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "mmddyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ",";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ".";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ",";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ".";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['html_dir_only'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }

}
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$contr_treemenu_home = new treemenu_home_class;
$contr_treemenu_home->treemenu_home_menu();

?>
