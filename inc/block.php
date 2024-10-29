<?php
class ABBAlertBox{
	public function __construct(){
		add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
		add_action( 'init', [$this, 'onInit'] );
	}

	function enqueueBlockAssets(){
		wp_register_style( 'fontAwesome', ABB_DIR_URL . 'assets/css/font-awesome.min.css', [], '6.4.2' ); // Icon
	}

	function onInit(){
		wp_register_style( 'abb-alert-box-style', ABB_DIR_URL . 'dist/style.css', [ 'fontAwesome' ], ABB_VERSION ); // Style
		wp_register_style( 'abb-alert-box-editor-style', ABB_DIR_URL . 'dist/editor.css', [ 'abb-alert-box-style' ], ABB_VERSION ); // Backend Style

		register_block_type( __DIR__, [
			'editor_style'		=> 'abb-alert-box-editor-style',
			'render_callback'	=> [$this, 'render']
		] ); // Register Block

		wp_set_script_translations( 'abb-alert-box-editor-script', 'alert-box-block', ABB_DIR_PATH . 'languages' );
	}

	function render( $attributes ){
		extract( $attributes );

		wp_enqueue_style( 'abb-alert-box-style' );
		wp_enqueue_script( 'abb-alert-box-script', ABB_DIR_URL . 'dist/script.js', [ 'react', 'react-dom' ], ABB_VERSION, true );
		wp_set_script_translations( 'abb-alert-box-script', 'alert-box-block', ABB_DIR_PATH . 'languages' );

		$className = $className ?? '';
		$blockClassName = "wp-block-abb-alert-box $className align$align";

		ob_start(); ?>
		<div class='<?php echo esc_attr( $blockClassName ); ?>' id='abbAlertBox-<?php echo esc_attr( $cId ); ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'></div>

		<?php return ob_get_clean();
	}
}
new ABBAlertBox();