<?php
/*
Plugin Name: BB Estilo Post Type
Plugin URI: http://www.dclick.com.br
Description: Cria post type para site BB Estilo
Author: Márcio S Sartini
Author URI: http://www.dclick.com.br
Version: 1.0
*/

add_action( 'init', 'create_post_type_editorias' );
add_action( 'init', 'create_post_type_eventos' );
add_action( 'init', 'create_post_type_anuncios' );




/** POST TYPE Editorias **/
  function create_post_type_editorias() {
 
     
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('Editorias', 'post type general name'),
         'singular_name' => _x('Editorias', 'post type singular name'),
         'add_new' => _x('Nova Editoria', 'Complementares'),
         'add_new_item' => __('Nova Editoria'),
         'edit_item' => __('Editar Editoria'),
         'new_item' => __('Nova Editoria'),
         'all_items' => __('Todas Editorias'),
         'view_item' => __('Ver Editorias'),
         'search_items' => __('Pesquisar Editorias'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'Editorias'
     );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'editorias', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'editorias',
         'rewrite' => array(
           'slug' => 'editorias',
           'with_front' => false,
         ),
         'capability_type' => 'post',
         'has_archive' => true,
         'hierarchical' => false,
         'menu_position' => null,
         'supports' => array('title', 'thumbnail', 'editor'),
         'taxonomies' => array('post_tag')
         )
    );

    //Label para taxonomia Materiais Complementares de Apoio
    $labels = array(
          'name' => _x( 'Categoria Editorias', 'Nome Geral para Taxonomia' ),
          'singular_name' => _x( 'Editoria', 'Nome singular para taxonomia' ),
          'search_items' =>  __( 'Busca Editoria' ),
          'all_items' => __( 'Todas Editorias' ),
          'parent_item' => __( 'Material Pai' ),
          'parent_item_colon' => __( 'Material Pai:' ),
          'edit_item' => __( 'Edita Editoria' ), 
          'update_item' => __( 'Atualiza Editoria' ),
          'add_new_item' => __( 'Nova Editoria' ),
          'new_item_name' => __( 'Nova Editoria - Categoria' ),
          'menu_name' => __( 'Categoria Editoria' ),
    );    
    
    //Registra taxonomia de banners :: POST TYPE noticias
    register_taxonomy('editorias_category',array('editorias'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'radio',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categoria-editorias' ),
    ));
}



/** POST TYPE Anuncios **/
function create_post_type_anuncios() {
 
     
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('Anuncios', 'post type general name'),
         'singular_name' => _x('Anuncios', 'post type singular name'),
         'add_new' => _x('Novo Anuncios', 'Complementares'),
         'add_new_item' => __('Novo Anuncios'),
         'edit_item' => __('Editar Anuncios'),
         'new_item' => __('Novo Anuncios'),
         'all_items' => __('Todos Anuncios'),
         'view_item' => __('Ver Anuncios'),
         'search_items' => __('Pesquisar Anuncios'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'Anuncios'
    );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'anuncios', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'anuncios',
         'rewrite' => array(
           'slug' => 'anuncios',
           'with_front' => false,
         ),
         'capability_type' => 'post',
         'has_archive' => true,
         'hierarchical' => false,
         'menu_position' => null,
         'supports' => array('title', 'thumbnail', 'editor'),
         'taxonomies' => array('post_tag')
         )
    );

    //Label para taxonomia Materiais Complementares de Apoio
    $labels = array(
          'name' => _x( 'Categoria Anuncios', 'Nome Geral para Taxonomia' ),
          'singular_name' => _x( 'Anuncio', 'Nome singular para taxonomia' ),
          'search_items' =>  __( 'Busca Anuncio' ),
          'all_items' => __( 'Todas Anuncios' ),
          'parent_item' => __( 'Material Pai' ),
          'parent_item_colon' => __( 'Material Pai:' ),
          'edit_item' => __( 'Edita Anuncio' ), 
          'update_item' => __( 'Atualiza Anuncio' ),
          'add_new_item' => __( 'Novo Anuncio' ),
          'new_item_name' => __( 'Novo Anuncio - Categoria' ),
          'menu_name' => __( 'Categoria Anuncio' ),
    );    
    
    //Registra taxonomia de banners :: POST TYPE noticias
    register_taxonomy('anuncios_category',array('anuncios', 'eventos', 'editorias'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'radio',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categoria-anuncios' ),
    ));
} 

    /** Cria taxonomia a partir do post type anuncios, apenas se estiver incluindo, se altera o nome
     * do anuncio no post type, cria uma categoria nova, se cria um anuncio  novo é cadastrado 
     * uma nova categoria para anuncio
     */
    add_action('save_post', 'cria_taxonomia_from_posttype_anuncio');
    function cria_taxonomia_from_posttype_anuncio( $post_id ){

        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
            return $post_id;

        if ( 'anuncios' == $_POST['post_type'] ){
            if (!wp_is_post_revision($post_id)){
                if (!term_exists( $_POST["post_title"], 'anuncios_category' )){

                    $termid = wp_insert_term( $_POST["post_title"], 'anuncios_category' );

                }
            }
        }

    }


 
/** POST TYPE Eventos **/
function create_post_type_eventos() {
 
      
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('Eventos', 'post type general name'),
         'singular_name' => _x('Eventos', 'post type singular name'),
         'add_new' => _x('Novo Evento', 'Complementares'),
         'add_new_item' => __('Novo Evento'),
         'edit_item' => __('Editar Evento'),
         'new_item' => __('Novo Evento'),
         'all_items' => __('Todos Eventos'),
         'view_item' => __('Ver Eventos'),
         'search_items' => __('Pesquisar Eventos'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'Eventos'
    );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'eventos', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'eventos',
         'rewrite' => array(
           'slug' => 'eventos',
           'with_front' => false,
         ),
         'capability_type' => 'post',
         'has_archive' => true,
         'hierarchical' => false,
         'menu_position' => null,
         'supports' => array('title', 'thumbnail', 'editor'),
         'taxonomies' => array('post_tag')
         )
    );

    //Label para taxonomia Materiais Complementares de Apoio
    $labels = array(
          'name' => _x( 'Categoria Eventos', 'Nome Geral para Taxonomia' ),
          'singular_name' => _x( 'Evento', 'Nome singular para taxonomia' ),
          'search_items' =>  __( 'Busca Evento' ),
          'all_items' => __( 'Todos Eventos' ),
          'parent_item' => __( 'Material Pai' ),
          'parent_item_colon' => __( 'Material Pai:' ),
          'edit_item' => __( 'Edita Evento' ), 
          'update_item' => __( 'Atualiza Evento' ),
          'add_new_item' => __( 'Novo Evento' ),
          'new_item_name' => __( 'Novo Evento - Categoria' ),
          'menu_name' => __( 'Categoria Evento' ),
    );    
    
    //Registra taxonomia de banners :: POST TYPE noticias
    register_taxonomy('eventos_category',array('eventos'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categoria-eventos' ),
    ));
}


?>