<?php
/**
 * @package WordPress
 * @subpackage My Web
 * @since My web Site 1.0
 **
 */
 
 	//var_dump(wp_get_current_user());
	if(wp_get_current_user()->user_login == 'ederton'){
		$producao = false;
	}else{
		$producao = true;
	}

	/* HABILITAR / DESABILITAR */

	// Enable featured images
	add_theme_support( 'post-thumbnails' );

	// Unable the admin bar
	add_filter('show_admin_bar', '__return_false');

	/* MENUS */
	add_action( 'after_setup_theme', 'register_menu' );
	function register_menu() {
	  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
	}

	/* ADICIONA CLASSE */
	add_filter( 'body_class', function( $classes ) {
	    return array_merge( $classes, array( 'page' ) );
	} );

	// muda nome post
	function change_post_label() {
	    global $menu;
	    global $submenu;
	    $menu[5][0] = 'Releases';
	    $submenu['edit.php'][5][0] = 'Todos os Releases';
	    $submenu['edit.php'][10][0] = 'Adicionar Release';
	    $submenu['edit.php'][16][0] = 'Tags';
	    echo '';
	}
	function change_post_object() {
	    global $wp_post_types;
	    $labels = &$wp_post_types['post']->labels;
	    $labels->name = 'Releases';
	    $labels->singular_name = 'Release';
	    $labels->add_new = 'Adicionar Release';
	    $labels->add_new_item = 'Adicionar Release';
	    $labels->edit_item = 'Editar Release';
	    $labels->new_item = 'Release';
	    $labels->view_item = 'Ver Release';
	    $labels->search_items = 'Buscar Release';
	    $labels->not_found = 'Nenhum Release encontrado';
	    $labels->not_found_in_trash = 'Nenhum Release encontrado no Lixo';
	    $labels->all_items = 'Todos Releases';
	    $labels->menu_name = 'Releases';
	    $labels->name_admin_bar = 'Releases';
	}
	 
	add_action( 'admin_menu', 'change_post_label' );
	add_action( 'init', 'change_post_object' );
	// muda nome post

	// remove itens padrões
	add_action( 'init', 'my_custom_init' );
	function my_custom_init() {
		remove_post_type_support( 'post', 'editor' ); // REMOVE EDITOR POST
		remove_post_type_support('page', 'editor'); // REMOVE EDITOR PAGE
		//remove_post_type_support( 'page', 'thumbnail' );
	}
	// remove page
	
	// REMOVE PARENT PAGE
	function remove_post_custom_fields() {
		remove_meta_box( 'pageparentdiv' , 'page' , 'side' ); 
	}
	add_action( 'admin_menu' , 'remove_post_custom_fields' );
	

	// Remove tags
	function myprefix_unregister_tags() {
	    unregister_taxonomy_for_object_type('post_tag', 'post');
	}
	add_action('init', 'myprefix_unregister_tags');
	// end Remove tags


	/* SIMULADORES DE CORES */
		// SALA
        /*
		add_action( 'init', 'create_sala' );
		function create_sala() {

			$labels = array(
			    'name' => _x('Sala', 'post type general name'),
			    'singular_name' => _x('Sala', 'post type singular name'),
			    'add_new' => _x('Adicionar Novo', 'Sala'),
			    'add_new_item' => __('Adicionar Novo'),
			    'edit_item' => __('Editar'),
			    'new_item' => __('Novo'),
			    'all_items' => __('Mostrar Todos'),
			    'view_item' => __('Visualisar Todos'),
			    'search_items' => __('Pesquisar'),
			    'not_found' =>  __('Nenhum Item Encontrado'),
			    'not_found_in_trash' => __('Nenhum Item Encontrado na Lixeira'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Simulador Sala'
			);
			$args = array(
			    'labels' => $labels,
			    'public' => true,
			    'publicly_queryable' => true,
			    'show_ui' => true,
			    'show_in_menu' => true,
			    'rewrite' => true,
			    'capability_type' => 'post',
			    'has_archive' => true,
			    'hierarchical' => false,
			    'menu_position' => null,
			    'menu_icon' => 'dashicons-art',
			    'supports' => array('')
			  );

		    register_post_type( 'sala', $args );
		}	
        */


		// COZINHA
        /*
		add_action( 'init', 'create_cozinha' );
		function create_cozinha() {

			$labels = array(
			    'name' => _x('Cozinha', 'post type general name'),
			    'singular_name' => _x('Cozinha', 'post type singular name'),
			    'add_new' => _x('Adicionar Novo', 'Cozinha'),
			    'add_new_item' => __('Adicionar Novo'),
			    'edit_item' => __('Editar'),
			    'new_item' => __('Novo'),
			    'all_items' => __('Mostrar Todos'),
			    'view_item' => __('Visualisar Todos'),
			    'search_items' => __('Pesquisar'),
			    'not_found' =>  __('Nenhum Item Encontrado'),
			    'not_found_in_trash' => __('Nenhum Item Encontrado na Lixeira'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Simulador Cozinha'
			);
			$args = array(
			    'labels' => $labels,
			    'public' => true,
			    'publicly_queryable' => true,
			    'show_ui' => true,
			    'show_in_menu' => true,
			    'rewrite' => true,
			    'capability_type' => 'post',
			    'has_archive' => true,
			    'hierarchical' => false,
			    'menu_position' => null,
			    'menu_icon' => 'dashicons-art',
			    'supports' => array('')
			  );

		    register_post_type( 'cozinha', $args );
		}
        */




		// BANHEIRO
        /*
		add_action( 'init', 'create_banheiro' );
		function create_banheiro() {

			$labels = array(
			    'name' => _x('Banheiro', 'post type general name'),
			    'singular_name' => _x('Banheiro', 'post type singular name'),
			    'add_new' => _x('Adicionar Novo', 'Banheiro'),
			    'add_new_item' => __('Adicionar Novo'),
			    'edit_item' => __('Editar'),
			    'new_item' => __('Novo'),
			    'all_items' => __('Mostrar Todos'),
			    'view_item' => __('Visualisar Todos'),
			    'search_items' => __('Pesquisar'),
			    'not_found' =>  __('Nenhum Item Encontrado'),
			    'not_found_in_trash' => __('Nenhum Item Encontrado na Lixeira'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Simulador Banheiro'
			);
			$args = array(
			    'labels' => $labels,
			    'public' => true,
			    'publicly_queryable' => true,
			    'show_ui' => true,
			    'show_in_menu' => true,
			    'rewrite' => true,
			    'capability_type' => 'post',
			    'has_archive' => true,
			    'hierarchical' => false,
			    'menu_position' => null,
			    'menu_icon' => 'dashicons-art',
			    'supports' => array('')
			  );

		    register_post_type( 'banheiro', $args );
		}
        */




		// PISCINA
        /*
		add_action( 'init', 'create_piscina' );
		function create_piscina() {

			$labels = array(
			    'name' => _x('Piscina', 'post type general name'),
			    'singular_name' => _x('Piscina', 'post type singular name'),
			    'add_new' => _x('Adicionar Novo', 'Piscina'),
			    'add_new_item' => __('Adicionar Novo'),
			    'edit_item' => __('Editar'),
			    'new_item' => __('Novo'),
			    'all_items' => __('Mostrar Todos'),
			    'view_item' => __('Visualisar Todos'),
			    'search_items' => __('Pesquisar'),
			    'not_found' =>  __('Nenhum Item Encontrado'),
			    'not_found_in_trash' => __('Nenhum Item Encontrado na Lixeira'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Simulador Piscina'
			);
			$args = array(
			    'labels' => $labels,
			    'public' => true,
			    'publicly_queryable' => true,
			    'show_ui' => true,
			    'show_in_menu' => true,
			    'rewrite' => true,
			    'capability_type' => 'post',
			    'has_archive' => true,
			    'hierarchical' => false,
			    'menu_position' => null,
			    'menu_icon' => 'dashicons-art',
			    'supports' => array('')
			  );

		    register_post_type( 'piscina', $args );
		}
        */



		// FACHADA
        /*
		add_action( 'init', 'create_fachada' );
		function create_fachada() {

			$labels = array(
			    'name' => _x('Fachada', 'post type general name'),
			    'singular_name' => _x('Fachada', 'post type singular name'),
			    'add_new' => _x('Adicionar Novo', 'Fachada'),
			    'add_new_item' => __('Adicionar Novo'),
			    'edit_item' => __('Editar'),
			    'new_item' => __('Novo'),
			    'all_items' => __('Mostrar Todos'),
			    'view_item' => __('Visualisar Todos'),
			    'search_items' => __('Pesquisar'),
			    'not_found' =>  __('Nenhum Item Encontrado'),
			    'not_found_in_trash' => __('Nenhum Item Encontrado na Lixeira'),
			    'parent_item_colon' => '',
			    'menu_name' => 'Simulador Fachada'
			);
			$args = array(
			    'labels' => $labels,
			    'public' => true,
			    'publicly_queryable' => true,
			    'show_ui' => true,
			    'show_in_menu' => true,
			    'rewrite' => true,
			    'capability_type' => 'post',
			    'has_archive' => true,
			    'hierarchical' => false,
			    'menu_position' => null,
			    'menu_icon' => 'dashicons-art',
			    'supports' => array('')
			  );

		    register_post_type( 'fachada', $args );
		}
        */

	/* FIM - SIMULADORES DE CORES */


	// PRODUTOS
	add_action( 'init', 'create_post_type_produto' );
	function create_post_type_produto() {

		$labels = array(
		    'name' => _x('Produtos', 'post type general name'),
		    'singular_name' => _x('Produto', 'post type singular name'),
		    'add_new' => _x('Adicionar Nova', 'Produto'),
		    'add_new_item' => __('Add New Produto'),
		    'edit_item' => __('Edit Produto'),
		    'new_item' => __('New Produto'),
		    'all_items' => __('Todas as Produto'),
		    'view_item' => __('View Produto'),
		    'search_items' => __('Search Produto'),
		    'not_found' =>  __('No Produto found'),
		    'not_found_in_trash' => __('No Produto found in Trash'),
		    'parent_item_colon' => '',
		    'menu_name' => 'Produtos'
		);
		$args = array(
		    'labels' => $labels,
		    'public' => true,
		    'publicly_queryable' => true,
		    'show_ui' => true,
		    'show_in_menu' => true,
		    'rewrite' => true,
		    'capability_type' => 'post',
		    'has_archive' => true,
		    'hierarchical' => false,
		    'menu_position' => null,
		    'menu_icon' => 'dashicons-tag',
		    'supports' => array('title','thumbnail')
		  );

	    register_post_type( 'produto', $args );
	}

	add_action( 'init', 'create_taxonomy_categoria_produto' );
	function create_taxonomy_categoria_produto() {

		$labels = array(
		    'name' => _x( 'Categorias de Produto', 'taxonomy general name' ),
		    'singular_name' => _x( 'Categorias', 'taxonomy singular name' ),
		    'search_items' =>  __( 'Search Categorias' ),
		    'all_items' => __( 'All Categories' ),
		    'parent_item' => __( 'Parent Categorias' ),
		    'parent_item_colon' => __( 'Parent Categorias:' ),
		    'edit_item' => __( 'Edit Categorias' ),
		    'update_item' => __( 'Update Categorias' ),
		    'add_new_item' => __( 'Add New Categorias' ),
		    'new_item_name' => __( 'New Categorias Name' ),
		    'menu_name' => __( 'Categorias' ),
		);

	    register_taxonomy( 'categoria_produto', array( 'produto' ), array(
	        'hierarchical' => true,
	        'labels' => $labels,
	        'show_ui' => true,
	        'show_in_tag_cloud' => true,
	        'query_var' => true,
			'has_archive' => 'produto',
			'rewrite' => array(
			    'slug' => 'produto',
			    'with_front' => false,
				),
	        )
	    );
	}

	add_action( 'init', 'gp_register_taxonomy_for_object_type' );
	function gp_register_taxonomy_for_object_type() {
	    register_taxonomy_for_object_type( 'post_tag', 'produto' );
	};



		// cfx_ferramentas
		add_action( 'init', 'create_post_type_cfx_ferramentas' );
		function create_post_type_cfx_ferramentas() {
	
			$labels = array(
				'name' => _x('CFX Ferramentas', 'post type general name'),
				'singular_name' => _x('CFX Ferramentas', 'post type singular name'),
				'add_new' => _x('Adicionar Nova', 'CFX Ferramentas'),
				'add_new_item' => __('Add New CFX Ferramentas'),
				'edit_item' => __('Edit CFX Ferramentas'),
				'new_item' => __('New CFX Ferramentas'),
				'all_items' => __('Todas as CFX Ferramentas'),
				'view_item' => __('View CFX Ferramentas'),
				'search_items' => __('Search CFX Ferramentas'),
				'not_found' =>  __('No CFX Ferramentas found'),
				'not_found_in_trash' => __('No CFX Ferramentas found in Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'CFX Ferramentas'
			);
			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'menu_icon' => 'dashicons-tag',
				'supports' => array('title','thumbnail')
			  );
	
			register_post_type( 'cfx-ferramentas', $args );
		}
	
		add_action( 'init', 'create_taxonomy_categoria_cfx_ferramentas' );
		function create_taxonomy_categoria_cfx_ferramentas() {
	
			$labels = array(
				'name' => _x( 'Categorias de CFX Ferramentas', 'taxonomy general name' ),
				'singular_name' => _x( 'Categorias', 'taxonomy singular name' ),
				'search_items' =>  __( 'Search Categorias' ),
				'all_items' => __( 'All Categories' ),
				'parent_item' => __( 'Parent Categorias' ),
				'parent_item_colon' => __( 'Parent Categorias:' ),
				'edit_item' => __( 'Edit Categorias' ),
				'update_item' => __( 'Update Categorias' ),
				'add_new_item' => __( 'Add New Categorias' ),
				'new_item_name' => __( 'New Categorias Name' ),
				'menu_name' => __( 'Categorias' ),
			);
	
			register_taxonomy( 'categoria_cfx_ferramentas', array( 'cfx-ferramentas' ), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_in_tag_cloud' => true,
				'query_var' => true,
				'has_archive' => 'cfx-ferramentas',
				'rewrite' => array(
					'slug' => 'cfx-ferramentas',
					'with_front' => false,
					),
				)
			);
		}



		// solucoes-ardex
		add_action( 'init', 'create_post_type_ardex' );
		function create_post_type_ardex() {
	
			$labels = array(
				'name' => _x('Soluções Ardex', 'post type general name'),
				'singular_name' => _x('Soluções Ardex', 'post type singular name'),
				'add_new' => _x('Adicionar Nova', 'Soluções Ardex'),
				'add_new_item' => __('Add New Soluções Ardex'),
				'edit_item' => __('Edit Soluções Ardex'),
				'new_item' => __('New Soluções Ardex'),
				'all_items' => __('Todas as Soluções Ardex'),
				'view_item' => __('View Soluções Ardex'),
				'search_items' => __('Search Soluções Ardex'),
				'not_found' =>  __('No Soluções Ardex found'),
				'not_found_in_trash' => __('No Soluções Ardex found in Trash'),
				'parent_item_colon' => '',
				'menu_name' => 'Soluções Ardex'
			);
			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => true,
				'hierarchical' => false,
				'menu_position' => null,
				'menu_icon' => 'dashicons-tag',
				'supports' => array('title','thumbnail')
			  );
	
			register_post_type( 'solucoes-ardex', $args );
		}
	
		add_action( 'init', 'create_taxonomy_categoria_solucoes_ardex' );
		function create_taxonomy_categoria_solucoes_ardex() {
	
			$labels = array(
				'name' => _x( 'Categorias de Soluções Ardex', 'taxonomy general name' ),
				'singular_name' => _x( 'Categorias', 'taxonomy singular name' ),
				'search_items' =>  __( 'Search Categorias' ),
				'all_items' => __( 'All Categories' ),
				'parent_item' => __( 'Parent Categorias' ),
				'parent_item_colon' => __( 'Parent Categorias:' ),
				'edit_item' => __( 'Edit Categorias' ),
				'update_item' => __( 'Update Categorias' ),
				'add_new_item' => __( 'Add New Categorias' ),
				'new_item_name' => __( 'New Categorias Name' ),
				'menu_name' => __( 'Categorias' ),
			);
	
			register_taxonomy( 'categoria_solucoes_ardex', array( 'solucoes-ardex' ), array(
				'hierarchical' => true,
				'labels' => $labels,
				'show_ui' => true,
				'show_in_tag_cloud' => true,
				'query_var' => true,
				'has_archive' => 'solucoes-ardex',
				'rewrite' => array(
					'slug' => 'solucoes-ardex',
					'with_front' => false,
					),
				)
			);
		}
	
		/*add_action( 'init', 'gp_register_taxonomy_for_object_type_cfx_ferramentas' );
		function gp_register_taxonomy_for_object_type_cfx_ferramentas() {
			register_taxonomy_for_object_type( 'post_tag', 'cfx_ferramentas' );
		};*/




	// matriz e filiais
	add_action('init', 'type_post_matriz_filiais');
	function type_post_matriz_filiais() {
		$labels = array(
			'name' => _x('Matriz e Filiais', 'post type general name'),
			'singular_name' => _x('Matriz e Filiais', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Itens'),
			'not_found' => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Matriz e Filiais'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-admin-multisite',
			'supports' => array('title', 'thumbnail')
		);

		register_post_type( 'matriz_filiais' , $args );
		flush_rewrite_rules();
	}


	// lojas
	/*
	add_action('init', 'type_post_lojas');
	function type_post_lojas() {
		$labels = array(
			'name' => _x('Lojas', 'post type general name'),
			'singular_name' => _x('Lojas', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Itens'),
			'not_found' => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Lojas'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-store',
			'supports' => array('title')
		);

		register_post_type( 'lojas' , $args );
		flush_rewrite_rules();
	}*/






/*if (function_exists( 'add_theme_support' )){
    add_filter('manage_posts_columns', 'posts_columns', 5);
    add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
   
    add_filter('manage_pages_columns', 'posts_columns', 5);
    add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
}

function posts_columns($defaults){
    $defaults['nome_prod_simulacao'] = __('Name');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
    if($column_name === 'nome_prod_simulacao'){
        echo the_post_thumbnail( array(125,125) );
    }
}
*/



add_filter( 'manage_sala_posts_columns', 'smashing_realestate_columns' );
function smashing_realestate_columns( $columns ) {
  
  
    $columns = array(
      'cb' => $columns['cb'],
      //'image_prod_simulacao' => __( 'Imagem' ),//
      'nome_prod_simulacao' => __( 'Name' )
      //'title' => __( 'Title' ),
    );
  
  
  return $columns;
}

add_action( 'manage_sala_posts_custom_column', 'smashing_realestate_column', 10, 2);
function smashing_realestate_column( $column, $post_id ) {

  if ( 'nome_prod_simulacao' === $column ) {

	$nome_produto = get_field_object('prod-simulacao',$post_id)['value']->post_title;
	echo '<a class="row-title" href="'.get_edit_post_link( $post_id ).'" aria-label="'.ucwords($nome_produto).' ('.__( 'Edit' ).')">'.ucwords($nome_produto).'</a>';

  }

}



// COZINHA
add_filter( 'manage_cozinha_posts_columns', 'smashing_cozinha_columns' );
function smashing_cozinha_columns( $columns ) {
    $columns = array(
      'cb' => $columns['cb'],
      'nome_prod_simulacao' => __( 'Name' )
    );
  return $columns;
}

add_action( 'manage_cozinha_posts_custom_column', 'smashing_cozinha_column', 10, 2);
function smashing_cozinha_column( $column, $post_id ) {

  if ( 'nome_prod_simulacao' === $column ) {

	$nome_produto = get_field_object('prod-simulacao',$post_id)['value']->post_title;
	echo '<a class="row-title" href="'.get_edit_post_link( $post_id ).'" aria-label="'.ucwords($nome_produto).' ('.__( 'Edit' ).')">'.ucwords($nome_produto).'</a>';

  }

}





// BANHEIRO
add_filter( 'manage_banheiro_posts_columns', 'smashing_banheiro_columns' );
function smashing_banheiro_columns( $columns ) {
    $columns = array(
      'cb' => $columns['cb'],
      'nome_prod_simulacao' => __( 'Name' )
    );
  return $columns;
}

add_action( 'manage_banheiro_posts_custom_column', 'smashing_banheiro_column', 10, 2);
function smashing_banheiro_column( $column, $post_id ) {

  if ( 'nome_prod_simulacao' === $column ) {

	$nome_produto = get_field_object('prod-simulacao',$post_id)['value']->post_title;
	echo '<a class="row-title" href="'.get_edit_post_link( $post_id ).'" aria-label="'.ucwords($nome_produto).' ('.__( 'Edit' ).')">'.ucwords($nome_produto).'</a>';

  }

}




// PISCINA
add_filter( 'manage_piscina_posts_columns', 'smashing_piscina_columns' );
function smashing_piscina_columns( $columns ) {
    $columns = array(
      'cb' => $columns['cb'],
      'nome_prod_simulacao' => __( 'Name' )
    );
  return $columns;
}

add_action( 'manage_piscina_posts_custom_column', 'smashing_piscina_column', 10, 2);
function smashing_piscina_column( $column, $post_id ) {

  if ( 'nome_prod_simulacao' === $column ) {

	$nome_produto = get_field_object('prod-simulacao-piscina',$post_id)['value']->post_title;
	echo '<a class="row-title" href="'.get_edit_post_link( $post_id ).'" aria-label="'.ucwords($nome_produto).' ('.__( 'Edit' ).')">'.ucwords($nome_produto).'</a>';

  }

}




// FACHADA
add_filter( 'manage_fachada_posts_columns', 'smashing_fachada_columns' );
function smashing_fachada_columns( $columns ) {
    $columns = array(
      'cb' => $columns['cb'],
      'nome_prod_simulacao' => __( 'Name' )
    );
  return $columns;
}

add_action( 'manage_fachada_posts_custom_column', 'smashing_fachada_column', 10, 2);
function smashing_fachada_column( $column, $post_id ) {

  if ( 'nome_prod_simulacao' === $column ) {

	$nome_produto = get_field_object('prod-simulacao-fachada',$post_id)['value']->post_title;
	echo '<a class="row-title" href="'.get_edit_post_link( $post_id ).'" aria-label="'.ucwords($nome_produto).' ('.__( 'Edit' ).')">'.ucwords($nome_produto).'</a>';

  }

}

/*
  // Name
  if ( 'nome_prod_simulacao' === $column ) {
	$nome_produto = explode('{:}', get_field_object('prod-simulacao-piscina',$post_id)['value']->post_title); 

	//var_dump($nome_produto);
	$idioma = WPGlobus::Config()->language;
	if($idioma == 'pt'){
		$nome_produto = explode('{:pt}', strtolower($nome_produto[0]));
		//var_dump($nome_produto);
		$nome_produto = $nome_produto[0];
	}

	if($idioma == 'en'){
		$nome_produto = explode('{:en}', strtolower($nome_produto[1]));
		$nome_produto = $nome_produto[0];
	}

	if($idioma == 'es'){
		$nome_produto = explode('{:es}', strtolower($nome_produto[2]));
		$nome_produto = $nome_produto[0];
	}

	//var_dump($nome_produto);
	echo '<a class="row-title" href="'.get_edit_post_link( $post_id ).'" aria-label="'.ucwords($nome_produto).' ('.__( 'Edit' ).')">'.ucwords($nome_produto).'</a>';
  }
}
*/



if((wp_get_current_user()->user_login == 'ederton')){
	$producao = false;
}else{
	$producao = true;
}

if($producao){
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
		#menu-media, #menu-comments, #menu-appearance, #menu-plugins, #menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
		#toplevel_page_zilla-likes, 
		#screen-options-link-wrap, 
		.acf-postbox h2 a, 
		#the-list #post-94, 
		#the-list #post-65, 
		#commentstatusdiv, 
		#commentsdiv, 
		#toplevel_page_wpglobus_options, 
		.taxonomy-category .form-field.term-parent-wrap, 
		.wp-menu-separator
		/*#toplevel_page_pmxi-admin-home li:nth-child(1), #toplevel_page_pmxi-admin-home li:nth-child(3), #toplevel_page_pmxi-admin-home li:nth-child(4), #toplevel_page_pmxi-admin-home li:nth-child(5) */ 
		{
			display: none!important;
		}
	  </style>';

	  echo '
		<script type="text/javascript">
			jQuery.noConflict();

			jQuery("document").ready(function(){
				jQuery("#menu-media").remove();
				jQuery("#menu-comments").remove();
				jQuery("#menu-appearance").remove();
				jQuery("#menu-plugins").remove();
				jQuery("#menu-tools").remove();
				jQuery("#menu-settings").remove();
				jQuery("#toplevel_page_edit-post_type-acf").remove();
				jQuery("#toplevel_page_edit-post_type-acf-field-group").remove();
				jQuery("#toplevel_page_zilla-likes").html("");
				jQuery(".taxonomy-category .form-field.term-parent-wrap").remove();
				jQuery(".wp-menu-separator").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(1)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(3)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(4)").remove();
				jQuery("#toplevel_page_pmxi-admin-home li:nth-child(5)").remove();
				jQuery("#toplevel_page_wpglobus_options").remove();
				jQuery("#commentstatusdiv").remove();
				jQuery("#commentsdiv").remove();
                jQuery("#toplevel_page_wp-mail-smtp").remove(); // WP mail SMTP
                jQuery("#toplevel_page_wp_file_manager").remove(); // WP File
                jQuery("#toplevel_page_sitepress-multilingual-cms-menu-languages").remove(); // WPML
                jQuery("#menu-posts-cookielawinfo").remove(); // LGPD

				jQuery("#toplevel_page_delete_all_posts").detach().insertBefore("#toplevel_page_pmxi-admin-home");
				jQuery("#toplevel_page_delete_all_posts .wp-menu-name").html("Apagar Lojas");
				jQuery("#toplevel_page_delete_all_posts .wp-first-item .wp-first-item").html("Apagar Todas");
				jQuery("#toplevel_page_delete_all_posts ul").remove();
			});
		</script>
	  ';
	}
}



function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}

if( function_exists('acf_add_options_page') ) {

	/*
    acf_add_options_page(array(
		'page_title' 	=> 'Slide Home',
		'menu_title'	=> 'Slide Home',
		'menu_slug' 	=> 'slide-home',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-admin-collapse'
	));
    */

	acf_add_options_page(array(
		'page_title' 	=> 'Simuladores',
		'menu_title'	=> 'Simuladores',
		'menu_slug' 	=> 'simuladores',
		'capability'	=> 'edit_posts',
		'redirect'		=> true,
		'icon_url' 		=> 'dashicons-editor-table'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Simuladores Sala',
		'menu_title'	=> 'Sala',
		'parent_slug'	=> 'simuladores',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Simuladores Cozinha',
		'menu_title'	=> 'Cozinha',
		'parent_slug'	=> 'simuladores',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Simuladores Banheiro',
		'menu_title'	=> 'Banheiro',
		'parent_slug'	=> 'simuladores',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Simuladores Piscina',
		'menu_title'	=> 'Piscina',
		'parent_slug'	=> 'simuladores',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Simuladores Fachada',
		'menu_title'	=> 'Fachada',
		'parent_slug'	=> 'simuladores',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Prêmios',
		'menu_title'	=> 'Prêmios',
		'menu_slug' 	=> 'premios',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-awards'
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Downloads',
		'menu_title'	=> 'Downloads',
		'menu_slug' 	=> 'downloads',
		'capability'	=> 'edit_posts',
		'redirect'		=> true,
		'icon_url' 		=> 'dashicons-paperclip'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Anúncios',
		'menu_title'	=> 'Anúncios',
		'parent_slug'	=> 'downloads',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Catálogos',
		'menu_title'	=> 'Catálogos',
		'parent_slug'	=> 'downloads',
	));
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Vídeos',
		'menu_title'	=> 'Vídeos',
		'parent_slug'	=> 'downloads',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Manuais Técnicos',
		'menu_title'	=> 'Manuais Técnicos',
		'parent_slug'	=> 'downloads',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Manuais CFX Ferramentas',
		'menu_title'	=> 'Manuais CFX Ferramentas',
		'parent_slug'	=> 'downloads',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Formulários',
		'menu_title'	=> 'Formulários',
		'menu_slug' 	=> 'formularios',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' 		=> 'dashicons-admin-comments'
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes-geral',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes-geral',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Slide de Produto',
		'menu_title'	=> 'Slide de Produto',
		'menu_slug' 	=> 'slide-produto',
		'parent_slug'	=> 'configuracoes-geral',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Imagem Categoria',
		'menu_title'	=> 'Imagem Categoria',
		'menu_slug' 	=> 'imagem-categoria-produto',
		'parent_slug'	=> 'configuracoes-geral',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Imagem Soluções',
		'menu_title'	=> 'Imagem Soluções',
		'menu_slug' 	=> 'imagem-solucoes',
		'parent_slug'	=> 'configuracoes-geral',
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Imagem CFX Ferramentas',
		'menu_title'	=> 'Imagem CFX Ferramentas',
		'menu_slug' 	=> 'imagem-cfx-ferramentas',
		'parent_slug'	=> 'configuracoes-geral',
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Imagem Soluções Ardex',
		'menu_title'	=> 'Imagem Soluções Ardex',
		'menu_slug' 	=> 'imagem-solucoes-ardex',
		'parent_slug'	=> 'configuracoes-geral',
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações de Lojas',
		'menu_title'	=> 'Lojas',
		'menu_slug' 	=> 'lojas',
		'parent_slug'	=> 'configuracoes-geral',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Ícone do Rodapé',
		'menu_title'	=> 'Ícones do Rodapé',
		'menu_slug' 	=> 'redes-sociais',
		'parent_slug'	=> 'configuracoes-geral',
	));
}


function wpse28145_add_custom_types( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        // this gets all post types:
        $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );


function paginacao() {
    global $wp_query;
    //var_dump($wp_query);
    //echo $wp_query->max_num_pages;

/*if{is_tax('categoria_produto')){

}*/

    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => __('<i class="fa fa-2x fa-angle-left"></i>'),
			'next_text'    => __('<i class="fa fa-2x fa-angle-right"></i>'),
    ) );

    //var_dump($pages);

    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<ul class="paginacao">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul>';
    }
}


function my_pre_get_posts( $query ) {
	if( is_admin() ) {
		return $query;		
	}
	
	if( $query->query_vars['post_type'] === 'lojas' && !is_admin() ) {
		if( isset($_GET['cidade']) ) {

			$query->set('meta_query', array(
				array(
					'key' => 'cidade',
					'value' => $_GET['cidade']
				),
				array(
					'key' => 'uf',
					'value' => $_GET['estado']
				)
			));

			$query->set('orderby', 'rand');
			$query->set('order', 'ASC');
			
    	}
	}
}

add_action('pre_get_posts', 'my_pre_get_posts');











	// CLIENTES
	/*
	add_action('init', 'type_post_clientes');
	function type_post_clientes() {
		$labels = array(
			'name' => _x('Clientes', 'post type general name'),
			'singular_name' => _x('Clientes', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Itens'),
			'not_found' => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Clientes'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-groups',
			'supports' => array('title', 'thumbnail')
		);

		register_post_type( 'clientes' , $args );
		flush_rewrite_rules();
	}
	*/


	// exportação
	/*
	add_action( 'init', 'create_post_type_exportacao' );
	function create_post_type_exportacao() {

		$labels = array(
		    'name' => _x('Exportação', 'post type general name'),
		    'singular_name' => _x('Exportação', 'post type singular name'),
		    'add_new' => _x('Adicionar Nova', 'Exportação'),
		    'add_new_item' => __('Add New Exportação'),
		    'edit_item' => __('Edit Exportação'),
		    'new_item' => __('New Exportação'),
		    'all_items' => __('Todas as Exportação'),
		    'view_item' => __('View Exportação'),
		    'search_items' => __('Search Exportação'),
		    'not_found' =>  __('No Exportação found'),
		    'not_found_in_trash' => __('No Exportação found in Trash'),
		    'parent_item_colon' => '',
		    'menu_name' => 'Exportação'
		);
		$args = array(
		    'labels' => $labels,
		    'public' => true,
		    'publicly_queryable' => true,
		    'show_ui' => true,
		    'show_in_menu' => true,
		    'rewrite' => true,
		    'capability_type' => 'post',
		    'has_archive' => true,
		    'hierarchical' => false,
		    'menu_position' => null,
		    'menu_icon' => 'dashicons-tag',
		    'supports' => array('title','editor','thumbnail')
		  );

	    register_post_type( 'exportacao', $args );
	}
	*/



	/* Insere campo do link do VIDEO *
	add_action( 'admin_menu', 'create_videoURL' );
	add_action( 'save_post', 'save_videoURL', 10, 2 );

	function create_videoURL() {
		add_meta_box( 'url-video', 'URL do Vídeo', 'videoURL', 'videos', 'normal', 'high' );
	}

	function videoURL( $object, $box ) { ?>
	    <p>
			<label for="url-video" style="margin-right: 10px;">URL do Vídeo: </label>
			<input name="url-video" id="url-video" style="width: 100%; max-width: 900px;" value="<?php echo wp_specialchars( get_post_meta( $object->ID, 'URL do Vídeo', true ), 1 ); ?>" />
		</p>
	<?php }

	function save_videoURL( $post_id, $post ) {
		$meta_value = get_post_meta( $post_id, 'URL do Vídeo', true );
		$new_meta_value = stripslashes( $_POST['url-video'] );

		if ( $new_meta_value && '' == $meta_value )
			add_post_meta( $post_id, 'URL do Vídeo', $new_meta_value, true );

		elseif ( $new_meta_value != $meta_value )
			update_post_meta( $post_id, 'URL do Vídeo', $new_meta_value );

		elseif ( '' == $new_meta_value && $meta_value )
			delete_post_meta( $post_id, 'URL do Vídeo', $meta_value );
	}

	*/




	/* ALBUNS DE FOTOS *
	add_action( 'init', 'create_post_type_fotos' );
	function create_post_type_fotos() {

		$labels = array(
		    'name' => _x('Álbum de Fotos', 'post type general name'),
		    'singular_name' => _x('Álbum de Fotos', 'post type singular name'),
		    'add_new' => _x('Adicionar Novo', 'Álbum de Fotos'),
		    'add_new_item' => __('Add New Álbum de Fotos'),
		    'edit_item' => __('Edit Álbum de Fotos'),
		    'new_item' => __('New Álbum de Fotos'),
		    'all_items' => __('Todos os Álbum'),
		    'view_item' => __('View Álbum de Fotos'),
		    'search_items' => __('Search Álbum de Fotos'),
		    'not_found' =>  __('No Álbum de Fotos found'),
		    'not_found_in_trash' => __('No Álbum de Fotos found in Trash'),
		    'parent_item_colon' => '',
		    'menu_name' => 'Álbum de Fotos'
		);
		$args = array(
		    'labels' => $labels,
		    'public' => true,
		    'publicly_queryable' => true,
		    'show_ui' => true,
		    'show_in_menu' => true,
		    'rewrite' => true,
		    'capability_type' => 'post',
		    'has_archive' => true,
		    'hierarchical' => false,
		    'menu_position' => null,
		    'menu_icon' => 'dashicons-format-gallery',
		    'supports' => array('title','editor','thumbnail','excerpt')
		  );

	    register_post_type( 'fotografias', $args );
	}

	add_action( 'init', 'create_taxonomy_categoria_fotos' );
	function create_taxonomy_categoria_fotos() {

		$labels = array(
		    'name' => _x( 'Categorias de Album', 'taxonomy general name' ),
		    'singular_name' => _x( 'Categorias', 'taxonomy singular name' ),
		    'search_items' =>  __( 'Search Categorias' ),
		    'all_items' => __( 'All Categories' ),
		    'parent_item' => __( 'Parent Categorias' ),
		    'parent_item_colon' => __( 'Parent Categorias:' ),
		    'edit_item' => __( 'Edit Categorias' ),
		    'update_item' => __( 'Update Categorias' ),
		    'add_new_item' => __( 'Add New Categorias' ),
		    'new_item_name' => __( 'New Categorias Name' ),
		    'menu_name' => __( 'Categorias' ),
		);

	    register_taxonomy( 'categoria_fotos', array( 'fotografias' ), array(
	        'hierarchical' => true,
	        'labels' => $labels,
	        'show_ui' => true,
	        'show_in_tag_cloud' => true,
	        'query_var' => true,
			'has_archive' => 'fotografias',
			'rewrite' => array(
			    'slug' => 'fotografias',
			    'with_front' => false,
				),
	        )
	    );
	}
*/




/*

	// Criar um novo tipo de post, ALBUM DE FOTOS
	add_action('init', 'type_post_albumFoto');
	function type_post_albumFoto() {
		$labels = array(
			'name' => _x('Album de Fotos', 'post type general name'),
			'singular_name' => _x('Album de Fotos', 'post type singular name'),
			'add_new' => _x('Adicionar Novo', 'Novo item'),
			'add_new_item' => __('Novo Item'),
			'edit_item' => __('Editar Item'),
			'new_item' => __('Novo Item'),
			'view_item' => __('Ver Item'),
			'search_items' => __('Procurar Itens'),
			'not_found' => __('Nenhum registro encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Album de Fotos'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'public_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_icon' => 'dashicons-format-gallery',
			'taxonomies' => array('category_albumFoto'),
			'supports' => array('title', 'excerpt', 'thumbnail'),
			'show_ui' => true,
			'show_in_menu' => true
		);

		register_post_type( 'albumFoto' , $args );
		flush_rewrite_rules();
	}
	
*/
	







	/*// Insere campo do link do VIDEO
	add_action( 'admin_menu', 'create_videoURL' );
	add_action( 'save_post', 'save_videoURL', 10, 2 );

	function create_videoURL() {
		add_meta_box( 'url-video', 'URL do Vídeo', 'videoURL', 'video', 'normal', 'high' );
	}

	function videoURL( $object, $box ) { ?>
	    <p>
			<label for="url-video" style="margin-right: 10px;">URL do Vídeo: </label>
			<input name="url-video" id="url-video" style="width: 100%; max-width: 900px;" value="<?php echo wp_specialchars( get_post_meta( $object->ID, 'URL do Vídeo', true ), 1 ); ?>" />
		</p>
	<?php }

	function save_videoURL( $post_id, $post ) {
		$meta_value = get_post_meta( $post_id, 'URL do Vídeo', true );
		$new_meta_value = stripslashes( $_POST['url-video'] );

		if ( $new_meta_value && '' == $meta_value )
			add_post_meta( $post_id, 'URL do Vídeo', $new_meta_value, true );

		elseif ( $new_meta_value != $meta_value )
			update_post_meta( $post_id, 'URL do Vídeo', $new_meta_value );

		elseif ( '' == $new_meta_value && $meta_value )
			delete_post_meta( $post_id, 'URL do Vídeo', $meta_value );
	}
*/



/*

  // Add Excerpt to pages
  add_post_type_support( 'page', 'excerpt' );
  // Remove GENERATED BY WORDPRESS
  remove_action('wp_head', 'wp_generator');
  // Windows Livr Writer
  remove_action('wp_head', 'wlwmanifest_link');
  // Remove the Shortcut link of header.
  remove_action( 'wp_head', 'wp_shortlink_wp_head' );
  remove_filter('term_description','wpautop');
  // Upgrade without FTP
  define('FS_METHOD','direct');
  // get the "contributor" role object
  // $obj_existing_role = get_role( 'contributor' );
  // add the "organize_gallery" capability
  // $obj_existing_role->add_cap( 'edit_published_posts' );
  // Insert featured image in Feeds.
  add_filter('the_content_feed', 'rss_post_thumbnail');
  function rss_post_thumbnail($content) {
    global $post;
    if( has_post_thumbnail($post->ID) )
      $content = '<p>' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</p>' . $content;
    return $content;
  }
  /////
  // SCRIPT ENQUEUE
  /////
  function tableless_scripts() {
    wp_deregister_script('jquery');
    wp_deregister_style('noticons');
    wp_dequeue_script('devicepx');
    wp_dequeue_script('e-201408');
    wp_register_script('disqus', get_template_directory_uri().'/assets/js/vendor/disqus.js', array(), '1.0', true );
    wp_register_script('prettify', get_template_directory_uri().'/assets/js/vendor/prettify/src/prettify.js', array(), '1.0', true );
    wp_register_script('scripts', get_template_directory_uri().'/assets/js/scripts.min.js', array(), '1.0', true );
    if (is_single()) {
      wp_enqueue_script('prettify');
      wp_enqueue_script('disqus');
    }
    wp_enqueue_script('scripts');
  }
  add_action( 'wp_enqueue_scripts', 'tableless_scripts' );
  //////
  // CSS ENQUEUE
  //////
  function tableless_styles() {
    wp_dequeue_style('subscriptions');
    wp_deregister_style('subscriptions');
    // wp_register_style( 'home', get_template_directory_uri() . '/assets/css/home.css', '1.0' );
    wp_register_style( 'single', get_template_directory_uri() . '/assets/css/single.css', '1.0' );
    // wp_register_style( 'prettify', get_template_directory_uri() . '/assets/css/prettify.css', '1.0' );
    // wp_register_style( 'category', get_template_directory_uri() . '/assets/css/category.css', '1.0' );
    if (is_home()) {
      wp_enqueue_style( 'home' );
    }
    if (is_single() || is_page()) {
      // wp_enqueue_style( 'prettify' );
      wp_enqueue_style( 'single' );
    }
    if (is_category() || is_search() || is_author() || is_page(42486, 'ultimos-posts')) {
      wp_enqueue_style( 'category' );
    }
  }
  add_action( 'wp_enqueue_scripts', 'tableless_styles' );
/////
// Widgets
/////
function tableless_widgets_init() {
  // Area 1, located at the top of the sidebar.
  register_sidebar( array(
    'name' => __( 'Sidebar do site', 'tableless' ),
    'id' => 'sidebar',
    'description' => __( 'Sidebar principal das páginas de posts e artigos', 'tableless' ),
    'before_widget' => '<div id="%1$s" class="tb-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="tb-widget-title">',
    'after_title' => '</h3>',
  ) );
}
// Register sidebars by running tableless_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'tableless_widgets_init' );
///
/// Deregister JetPack garbage
///
// First, make sure Jetpack doesn't concatenate all its CSS
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
// Then, remove each CSS file, one at a time
function jeherve_remove_all_jp_css() {
  wp_deregister_style( 'AtD_style' ); // After the Deadline
  wp_deregister_style( 'jetpack_likes' ); // Likes
  wp_deregister_style( 'jetpack_related-posts' ); //Related Posts
  wp_deregister_style( 'jetpack-carousel' ); // Carousel
  wp_deregister_style( 'grunion.css' ); // Grunion contact form
  wp_deregister_style( 'the-neverending-homepage' ); // Infinite Scroll
  wp_deregister_style( 'infinity-twentyten' ); // Infinite Scroll - Twentyten Theme
  wp_deregister_style( 'infinity-twentyeleven' ); // Infinite Scroll - Twentyeleven Theme
  wp_deregister_style( 'infinity-twentytwelve' ); // Infinite Scroll - Twentytwelve Theme
  wp_deregister_style( 'noticons' ); // Notes
  wp_deregister_style( 'post-by-email' ); // Post by Email
  wp_deregister_style( 'publicize' ); // Publicize
  wp_deregister_style( 'sharedaddy' ); // Sharedaddy
  wp_deregister_style( 'sharing' ); // Sharedaddy Sharing
  wp_deregister_style( 'stats_reports_css' ); // Stats
  wp_deregister_style( 'jetpack-widgets' ); // Widgets
  wp_deregister_style( 'jetpack-slideshow' ); // Slideshows
  wp_deregister_style( 'presentations' ); // Presentation shortcode
  wp_deregister_style( 'jetpack-subscriptions' ); // Subscriptions
  wp_deregister_style( 'tiled-gallery' ); // Tiled Galleries
  wp_deregister_style( 'widget-conditions' ); // Widget Visibility
  wp_deregister_style( 'jetpack_display_posts_widget' ); // Display Posts Widget
  wp_deregister_style( 'gravatar-profile-widget' ); // Gravatar Widget
  wp_deregister_style( 'widget-grid-and-list' ); // Top Posts widget
  wp_deregister_style( 'jetpack-top-posts-widget' ); // Top Posts widget
  wp_deregister_style( 'jetpack-widgets' ); // Widgets
}
add_action('wp_print_styles', 'jeherve_remove_all_jp_css' );

*/


?>