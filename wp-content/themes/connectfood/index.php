<?php 

 
// Cria chamada para aplicacao
$facebook = new Facebook(array(
  'appId'  => '622330351110346',
  'secret' => 'c68c23c630c52dd1bafb700f6798dc46',
));


// Get User ID
// See if there is a user from a cookie
$user = $facebook->getUser();


if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    $_SESSION['fb_id'] = $user_profile['id'];
    $_SESSION['fb_name'] = $user_profile['name'];
    $_SESSION['fb_email'] = $user_profile['email']; 
  
   

  } catch (FacebookApiException $e) {
      
    //echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    $user = null;
  }
} else {
    unset($_SESSION);
}
 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connect food combr</title>
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/css/dd.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.css?v=2.0.6" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.dd.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/source/jquery.fancybox.js?v=2.0.6"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/custom.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(".mydds").msDropDown();
$('.fancybox').fancybox();
});
</script>
<style type="text/css">
.text_box{ behavior:url(PIE.htc);}
.buscar_bt, .input-text{ behavior:url(PIE.htc);}
.drop_down_menu{ behavior:url(PIE.htc);}
.main_content{ behavior:url(PIE.htc);}
.client_area a.big-action-button.facebook-signin { background-image: -moz-linear-gradient(center top , #3857A1, #264285);}
.client_area a.big-action-button, .restaurant_area a.big-action-button { -moz-transition: all 400ms ease 0s;}
.client_area a.big-action-button, .restaurant_area a.big-action-button { text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);}
.client_area a.big-action-button:active, .restaurant_area a.big-action-button:active {
    -moz-transform: scale(0.99);
    -moz-transition: none 0s ease 0s;
}
.client_area a.big-action-button, .restaurant_area a.big-action-button {
    -moz-transition: all 400ms ease 0s;
    background-color: #F41D36;
    background-image: -moz-linear-gradient(center top , #F41D36, #E61033);
    border: 1px solid;
    border-radius: 7px 7px 7px 7px;
    box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.3), -1px 1px 1px rgba(255, 255, 255, 0.75) inset;
    color: white;
    display: inline-block !important;
    font-size: 16px !important;
    line-height: 24px;
    margin-bottom: 7px;
    padding: 0 10px;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.5);
}
.text_field1{behavior:url(PIE.htc);}
.enter_bt{ behavior:url(PIE.htc); }
</style>
</head>

<body class="home">
	<div id="wrap">
    	<div id="main"><!-- main -->
	<div class="header">
    	<div class="header_wrap">
        	<div class="header_top">
            	<ul>
                	<li><a class="fancybox" href="#inline1"><img src="<?php echo get_template_directory_uri(); ?>/img/icon.png" alt="" /> Log in</a></li>
                    <li><a href="#">Cadastre-se </a></li>
                    <li class="last"><a href="#">Conecte seu estabelecimento</a></li>
                </ul>
                <div class="clear"></div>
            	
            </div>
            <div class="clear"></div>
            <div class="header_midd">
            
            <!-- logo -->
            
            <div class="logo">
            	<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="" /></a>
                <span><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/f_like_icon.jpg" alt="" /></a></span>
            	
            </div>
            
            <!-- form area start -->
            
            <div class="form_area fltright">
            	<form action="#" method="post">
                	<div class="text_box">
                    	<input type="button" name="" value="" class="search_bt" />
                        <input type="text" name="field-name-here" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Busque pelo CEP':this.value;" 
                 		value="Busque pelo CEP" class="text_field" />
                    	
                        
                    </div>
                    
                    <div><label>OU</label></div>
                    
                	
                   		<div>
                        <div class="select_box">
                        	<div class="input-text">
                            	<input type="text" name="" value="Busque pelo endereço, Ex.: Av. Paulista, 2015" onclick="this.value='';" onfocus="this.select()" />
                                <div id="locmenu">
                                	<ul>
                                    	<li><a href="#">Últimas visitas</a></li>
                                        <li><a href="#">TOP 100</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="" value="Buscar" class="buscar_bt" />
                        </div>
                    
                </form>
            </div>
            <div class="clear"></div>
            </div>
            <!-- header midd -->
            
            <div class="ym-hlist">
            	<ul>
                	<li><a class="acc_trigger" href="#">DESTAQUES</a>
                    	<div class="drop_down_menu submenu">
                	<ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    <div class="clear"></div>
                	
                	
                	
                </div>                                     
                    </li>
                    <li><a class="acc_trigger" href="#">DELIVERY</a>
                    	<div class="drop_down_menu submenu2">
                	<ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    <div class="clear"></div>
                	
                	
                	
                </div>
                    </li>
                    <li><a class="acc_trigger" href="#">TIPOS</a>
                    	<div class="drop_down_menu submenu3">
                	<ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    <div class="clear"></div>
                	
                	
                	
                </div>                    
                    </li>
                    <li><a class="acc_trigger" href="#">ESPECIALIDADES</a>
                    	<div class="drop_down_menu submenu4">
                	<ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    <div class="clear"></div>
                	
                	
                	
                </div>
                    </li>
                    <li><a class="acc_trigger" href="#">COZINHAS</a>
                    	<div class="drop_down_menu submenu5">
                	<ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    <div class="clear"></div>
                	
                	
                	
                </div>
                    </li>
                    <li><a class="acc_trigger" href="#">FAVORITOS</a>
                    	<div class="drop_down_menu submenu6">
                	<ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    
                    <ul>
                    	<li><a href="#">Restaurants</a></li>
                        <li><a href="#">Fast Food</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Family-Friendly Dining</a></li>
                        <li><a href="#">Southern</a></li>
                        <li><a href="#">Traditional American</a></li>
                        <li><a href="#">Lunch Spot</a></li>
                        <li><a href="#">Cheap Eats</a></li>
                        <li><a href="#">Dessert Shops</a></li>
                        <li><a href="#">Seafood</a></li>
                    	
                    </ul>
                    <div class="clear"></div>
                	
                	
                	
                </div>
                    </li>
                </ul>
                <div class="clear"></div>
                
            
            	
            </div>
            <!-- menu ym_hlist-->
        </div>
    </div>
    <div class="content">
    <div class="content_wrap">
            	
            	<h1>Peça online sua opção de comida, e receba em casa...</h1>
                	<div class="main_content">
                    	<div class="escolha_box">
                    	<ul>
                        	<li class="first_1"><a href="#"> <strong>1 </strong><span>Escolha um restaurante</span></a></li>
                            <li><a href="#"> <strong>2 </strong><span>Confirme sua localização</span></a></li>
                             <li><a href="#"> <strong>3 </strong><span>Monte seu pedidoo</span></a></li>
                             <li><a href="#"> <strong>4 </strong><span>Receba em casa</span></a></li>
                            
                        </ul>
                        <div class="clear"></div>
                        </div>
                        
                       <div class="face_book_info">
                        	<div class="client_area">
                                    <p>Faça parte e peça delivery online</p>
                                    <a id="facebook-signin-button" class="big-action-button facebook-signin" href="#">
                                    <span class="icon"></span>
                                    Conectar usando Facebook
                                    </a>
                                    <a id="signup-button" class="big-action-button red" href="#">Cadastre-se</a>
                                    </div>
                            <div class="restaurant_area">
                                <p>Donos de Estabelecimentos</p>
                                <a id="signup-button2" class="big-action-button red" href="#">Conecte seu restaurante</a>
                                </div>
                          
                        <div class="clear"></div>
                        </div>
                        <div class="add_info_area">
                        	<div class="left_text_box fltleft">
                            	Estabelecimentos que já fazem parte:
                            </div>
                            <div class="right_logo_area fltleft">
                            	<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_1.jpg" alt="" /></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_2.jpg" alt="" /></a>
                                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_3.jpg" alt="" /></a>
                                <a class="last_logo" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo_4.jpg" alt="" /></a>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div><!-- main content -->
                    
                    	<div class="public_info">
                        	<h3>Publicidade</h3>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/add_pic.jpg" alt="" />
                        </div>
                        <div style="height:16px"></div>
                    </div>
            </div>
            </div><!-- main -->
          </div><!-- wrap end -->
         
            <!-- footer -->
            <div class="footer">
            	<div class="footer_wrap">
                	<div class="border_top">
                    	<img src="<?php echo get_template_directory_uri(); ?>/img/green_border.jpg" alt="" />
                    </div>
                    
                    
                    <div class="footer_top">
                    
                    <div class="footer_food-info_box fltleft">
                    	<h3>Sobre o Connect Food </h3>
                    	<ul>
                        	<li><a href="#">Quem Somos</a></li>
                            <li><a href="#">Contato	</a></li>
                        </ul>
                    	
                    </div>
                    <div class="footer_food-info_box fltleft">
                    	<h3>Download </h3>
                    	<ul>
                        	<li><a href="#">iPhone</a></li>
                            <li><a href="#">Android	</a></li>
                            <li><a href="#">Blackberry	</a></li>
                            <li><a href="#">Palm	</a></li>
                            <li><a href="#">Windows Phone 7	</a></li>
                        </ul>
                    	
                    	
                    </div>
                    <div class="footer_food-info_box fltleft">
                    	<h3>Ajuda</h3>
                    	<ul>
                        	<li><a href="#">FAQ</a></li>
                            <li><a href="#">Feedback	</a></li>
                        </ul>
                    	
                    	
                    </div>
                    <div class="footer_food-info_box fltleft">
                    	<h3>Social</h3>
                    	<ul>
                        	<li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    	
                    	
                    </div>
                    <div class="clear"></div>
                </div><!-- footer_top -->
                	<div class="footer_bottom">
                    	<div class="terms_left_box fltleft">
                        	<ul>
                            	<li><a href="#">Termos e Condições de Uso</a></li>
                                <li class="footer_last"><a href="#">Politica de Privacidade</a></li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        	<div class="content_food fltright">
                            	&reg; Connect Food  2012
                            </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
             <!-- footer -->
             <div id="inline1" style="width:675px;display: none;">
             <div class="light_box">
             	<span style="display:none;">fechar X</span>
                <div class="clear"></div>
                <div class="left_conectese_box fltleft">
                	<h2>Conecte-se</h2>
                    	<form action="#" method="post">
                        	<div>
                            	<input type="text" name="field-name-here" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Email':this.value;" 
                 					value="Email" class="text_field1" />
                                <input type="text" name="field-name-here" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Senha':this.value;" 
                                value="Senha" class="text_field1" />
                            </div>
                            <div class="check_box fltleft">
                            	<input name="" type="checkbox" value="" class="check_box1" />
                                <label>Manter-me Logado</label>
                            </div>
                            <div>
                            	<input type="submit" name="" value="Entrar" class="enter_bt" />
                            	
                            </div>
                        </form>
                	
                </div>
                <div class="right_cadastardo_box fltleft">
                	<h2>Não é cadastrado?</h2>
                                   <div class="client_area no_height">
                                   
                                    <a id="facebook-signin-button2" class="big-action-button facebook-signin getheight1 nomar1" href="#">
                                    <span class="icon"></span>
                                    Conectar usando Facebook
                                    </a>
                                   
                                    </div>
                                    
                                    
                                    
                         <span> Ou<strong><a href="#"> Cadastre seu e-mail</a></strong></span>
                </div>
                <div class="clear"></div>
                <div class="senha_text_box"><a href="#">Esqueceu sua senha?</a></div>
             	
             </div>
             
             </div>
	
</body>
</html>
