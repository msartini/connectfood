<?php
/*
Plugin Name: Foz Odebrecht Post Type
Plugin URI: http://www.dclick.com.br
Description: Cria post type para site Foz Odebrecht
Author: Márcio S Sartini
Author URI: http://www.dclick.com.br
Version: 1.0
*/


add_action( 'init', 'create_post_type_unidades' );
add_action( 'init', 'create_post_type_empresas' );
add_action( 'init', 'create_post_type_oanaimprensa' );
add_action( 'init', 'create_post_type_fiquepordentro' );
add_action( 'init', 'create_post_type_ancoras' );


/** POST TYPE Imprensa **/
  function create_post_type_ancoras() {
 
     
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('Ancoras', 'post type general name'),
         'singular_name' => _x('Imprensa', 'post type singular name'),
         'add_new' => _x('Nova ancora', 'Complementares'),
         'add_new_item' => __('Nova ancora'),
         'edit_item' => __('Editar Ancora'),
         'new_item' => __('Nova Ancora'),
         'all_items' => __('Todas Ancoras'),
         'view_item' => __('Ver Ancoras'),
         'search_items' => __('Pesquisar Ancoras'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'Âncoras'
     );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'ancoras', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'ancora',
         'rewrite' => array(
           'slug' => 'ancora',
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

        //Label para taxonomia Segmentos da unidades
    $labels = array(
          'name' => _x( 'Âncoras das Páginas', 'Nome Geral para Taxonomia' ),
          'singular_name' => _x( 'Âncoras', 'Nome singular para taxonomia' ),
          'search_items' =>  __( 'Busca Âncora' ),
          'all_items' => __( 'Todas Âncoras' ),
          'parent_item' => __( 'Âncora Pai' ),
          'parent_item_colon' => __( 'Âncora Pai:' ),
          'edit_item' => __( 'Edita Âncora' ), 
          'update_item' => __( 'Atualiza Âncora' ),
          'add_new_item' => __( 'Nova Âncora' ),
          'new_item_name' => __( 'Nova Âncora - Categoria' ),
          'menu_name' => __( 'Categoria Âncora' ),
    );    
    
    //Registra taxonomia Segmentos da unidades
    register_taxonomy('ancoras_category',array('ancoras'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'radio',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categoria-ancora' ),
    ));
}

/** POST TYPE Imprensa **/
  function create_post_type_oanaimprensa() {
 
     
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('OAnaImprensa', 'post type general name'),
         'singular_name' => _x('Imprensa', 'post type singular name'),
         'add_new' => _x('Novo artigo', 'Complementares'),
         'add_new_item' => __('Novo artigo'),
         'edit_item' => __('Editar Artigo'),
         'new_item' => __('Novo Artigo'),
         'all_items' => __('Todos Artigos'),
         'view_item' => __('Ver Artigos'),
         'search_items' => __('Pesquisar Artigos'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'OA na Imprensa'
     );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'oanaimprensa', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'oanaimprensa',
         'rewrite' => array(
           'slug' => 'oanaimprensa',
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
}

/** POST TYPE Fique por Dentro **/
  function create_post_type_fiquepordentro() {
 
     
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('Fiquepordentro', 'post type general name'),
         'singular_name' => _x('Fique por Dentro', 'post type singular name'),
         'add_new' => _x('Novo artigo', 'Complementares'),
         'add_new_item' => __('Novo artigo'),
         'edit_item' => __('Editar Artigo'),
         'new_item' => __('Novo Artigo'),
         'all_items' => __('Todos Artigos'),
         'view_item' => __('Ver Artigos'),
         'search_items' => __('Pesquisar Artigos'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'Fique por Dentro'
     );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'fiquepordentro', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'fiquepordentro',
         'rewrite' => array(
           'slug' => 'fiquepordentro',
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
}







/** POST TYPE Unidades **/
  function create_post_type_unidades() {
 
     
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('Unidades', 'post type general name'),
         'singular_name' => _x('Unidades', 'post type singular name'),
         'add_new' => _x('Nova Unidade', 'Complementares'),
         'add_new_item' => __('Nova Editoria'),
         'edit_item' => __('Editar Unidade'),
         'new_item' => __('Nova Unidade'),
         'all_items' => __('Todas Unidades'),
         'view_item' => __('Ver Unidades'),
         'search_items' => __('Pesquisar Unidades'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'Unidades'
     );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'unidades', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'unidades',
         'rewrite' => array(
           'slug' => 'unidades',
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
          'name' => _x( 'Categoria Unidades', 'Nome Geral para Taxonomia' ),
          'singular_name' => _x( 'Unidade', 'Nome singular para taxonomia' ),
          'search_items' =>  __( 'Busca Unidade' ),
          'all_items' => __( 'Todas Unidades' ),
          'parent_item' => __( 'Unidade Pai' ),
          'parent_item_colon' => __( 'Unidade Pai:' ),
          'edit_item' => __( 'Edita Unidade' ), 
          'update_item' => __( 'Atualiza Unidade' ),
          'add_new_item' => __( 'Nova Unidade' ),
          'new_item_name' => __( 'Nova Unidade - Categoria' ),
          'menu_name' => __( 'Categoria Unidade' ),
    );    
    
    //Registra taxonomia de banners :: POST TYPE noticias
   /* register_taxonomy('unidades_category',array('page'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'checked',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categoria-unidades' ),
    ));

    */
    //Label para taxonomia Segmentos da unidades
    $labels = array(
          'name' => _x( 'Segmento Unidades', 'Nome Geral para Taxonomia' ),
          'singular_name' => _x( 'Segmento', 'Nome singular para taxonomia' ),
          'search_items' =>  __( 'Busca Segmento' ),
          'all_items' => __( 'Todas Segmentos' ),
          'parent_item' => __( 'Segmento Pai' ),
          'parent_item_colon' => __( 'Segmento Pai:' ),
          'edit_item' => __( 'Edita Segmento' ), 
          'update_item' => __( 'Atualiza Segmento' ),
          'add_new_item' => __( 'Nova Segmento' ),
          'new_item_name' => __( 'Nova Segmento - Categoria' ),
          'menu_name' => __( 'Categoria Segmento' ),
    );    
    
    //Registra taxonomia Segmentos da unidades
    register_taxonomy('segmentos_category',array('unidades', 'empresas'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'checked',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categoria-segmento' ),
    ));
}


/** POST TYPE Empresas **/
  function create_post_type_empresas() {
 
     
     /** Labels customizados para o tipo de post **/
    $labels = array(
         'name' => _x('Empresas', 'post type general name'),
         'singular_name' => _x('Empresas', 'post type singular name'),
         'add_new' => _x('Nova Empresa', 'Complementares'),
         'add_new_item' => __('Nova Empresa'),
         'edit_item' => __('Editar Empresa'),
         'new_item' => __('Nova Empresa'),
         'all_items' => __('Todas Empresas'),
         'view_item' => __('Ver Empresas'),
         'search_items' => __('Pesquisar Empresas'),
         'not_found' =>  __('Nenhum item encontrado.'),
         'not_found_in_trash' => __('Nenhum item de encontrado na lixeira.'),
         'parent_item_colon' => '',
         'menu_name' => 'Empresas'
     );
    
    /**  Registrando o tipo de post, passando os labels e parâmetros de controle **/
    register_post_type( 'empresas', array(
         'labels' => $labels,
         'public' => true,
         'publicly_queryable' => true,
         'show_ui' => true,
         'show_in_menu' => true,
         'has_archive' => 'empresas',
         'rewrite' => array(
           'slug' => 'empresas',
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

    //Label para taxonomia Segmentos da empresas
    $labels = array(
          'name' => _x( 'Grupo Empresas', 'Nome Geral para Taxonomia' ),
          'singular_name' => _x( 'Empresa', 'Nome singular para taxonomia' ),
          'search_items' =>  __( 'Busca Empresa' ),
          'all_items' => __( 'Todas Empresas' ),
          'parent_item' => __( 'Empresa Pai' ),
          'parent_item_colon' => __( 'Empresa Pai:' ),
          'edit_item' => __( 'Edita Empresa' ), 
          'update_item' => __( 'Atualiza Empresa' ),
          'add_new_item' => __( 'Nova Empresa' ),
          'new_item_name' => __( 'Nova Empresa - Categoria' ),
          'menu_name' => __( 'Categoria Empresa' ),
    );    
    
    //Registra taxonomia Segmentos da unidades
    register_taxonomy('empresas_category',array('unidades', 'empresas'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => 'checked',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'categoria-empresa' ),
    ));





  }

// Cria taxonomia a partir do post type Unidade, cria com o mesmo nome da unidade
/** Cria taxonomia a partir do post type autor, apenas se estiver incluindo, se altera o nome
     * do autor no post type, cria uma categoria nova, se cria um autor  novo é cadastrado 
     * uma nova categoria para autor
     */
    add_action('save_post', 'cria_taxonomia_from_posttype_unidade');
    function cria_taxonomia_from_posttype_unidade( $post_id ){

        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
            return $post_id;

        if ( 'unidades' == $_POST['post_type'] ){
            if (!wp_is_post_revision($post_id)){
                if (!term_exists( $_POST["post_title"], 'unidades_category' )){

                    $termid = wp_insert_term( $_POST["post_title"], 'unidades_category' );

                }
            }
        }

    }

    // Cria taxonomia a partir do post type Unidade, cria com o mesmo nome da unidade
    /** Cria taxonomia a partir do post type autor, apenas se estiver incluindo, se altera o nome
     * do autor no post type, cria uma categoria nova, se cria um autor  novo é cadastrado 
     * uma nova categoria para autor
     */
    add_action('save_post', 'cria_taxonomia_from_posttype_empresa');
    function cria_taxonomia_from_posttype_empresa( $post_id ){

        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
            return $post_id;

        if ( 'empresas' == $_POST['post_type'] ){
            if (!wp_is_post_revision($post_id)){
                if (!term_exists( $_POST["post_title"], 'empresas_category' )){

                    $termid = wp_insert_term( $_POST["post_title"], 'empresas_category' );

                }
            }
        }

    }


    /**
     * @author marcio de souza sartini
     * Pesquisa custom post type por categoria ancoras no admin :: POST TYPE: ancoras  
     * Cria combo box para efetuar busca no admin por taxonomia disciplinas_category
     */
    add_action( 'restrict_manage_posts', 'my_restrict_manage_post_type_ancora_category' );
    function my_restrict_manage_post_type_ancora_category() {
        global $typenow;
        $taxonomy = $typenow.'_type';
     
        if( $typenow == "ancoras" ){
            $filters = array('ancoras_category');
            foreach ($filters as $tax_slug) {
                $tax_obj = get_taxonomy($tax_slug);
                $tax_name = $tax_obj->labels->name;
                $terms = get_terms($tax_slug);
                echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
                echo "<option value=''>Mostra todas $tax_name</option>";
                foreach ($terms as $term) { echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; }
                echo "</select>";
            }
        }
    }

?>