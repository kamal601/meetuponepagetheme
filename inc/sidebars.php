<?php 


class meetup_one_page_Sidebars{
	public function __construct() {
		add_action('widgets_init', array($this, 'register'));
	}

	public function register() {
		

		register_sidebar( array(
            'name'          => esc_html__('Footer First Section','meetup_one_page'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Add widgets here for footer First','meetup_one_page'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h3 class="content-ct"><span class="ti-email"></span>',
            'after_title'   =>'</h3>',
        ));
        register_sidebar( array(
            'name'          => esc_html__('Footer Bottom Section','meetup_one_page'),
            'id'            => 'footer-4',
            'description'   => esc_html__('Add widgets here for footer Third column','meetup_one_page'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   =>'',
        ));

	/*Custom Widget Register*/

    register_widget('meetup_one_page_Footer_forth_widget');
    register_widget('meetup_one_page_Footer_first_widget');


	/*Sidebar Wedgeds*/

	}
	}


//Footer Forth Widget

class meetup_one_page_Footer_first_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'contact_form',
            esc_html__('Footer Contact form widget','meetup_one_page'),
            array(
                'description'  => esc_html__('this is Footer contactform widget','meetup_one_page')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(!empty($instance['title'])){
            echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

            <?php echo $instance['linkone']; ?>
        <?php 
        echo $args['after_widget'];
    }
    public function form($instance){
        $title = !empty($instance['title'])? $instance['title']: esc_html__('write Title here','meetup_one_page');
        $linkone = !empty($instance['linkone'])? $instance['linkone']: esc_html__('Item One','meetup_one_page');

       
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title','meetup_one_page');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkone')); ?>">
                <?php esc_attr_e('linkone','meetup_one_page');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkone')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkone')); ?>"
                type="text"
                value="<?php echo esc_attr($linkone); ?>">
        </p>

       

    <?php }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
        $instance['linkone'] = (!empty($new_instance['linkone']))? strip_tags($new_instance['linkone']):'';

        return $instance;
    }
}



class meetup_one_page_Footer_forth_widget extends WP_Widget{
    function __construct(){
        parent::__construct(
            'footer_bottom',
            esc_html__('Footer Copy Right widget','meetup_one_page'),
            array(
                'description'  => esc_html__('this is Footer Second widget','meetup_one_page')
            )
        );
    }
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(!empty($instance['title'])){
            echo $args['before_title'].apply_filters('widget_title',$instance['title']).$args['after_title'];
        }; ?>

     Design: <a href="<?php echo $instance['linkone'];  ?>"><?php echo $instance['linkText'];  ?></a>
        Images: <a href="<?php echo $instance['linkTwo'];  ?>"><?php echo $instance['linkTwoText'];  ?></a>

        <?php 
        echo $args['after_widget'];
    }
    public function form($instance){
        $title = !empty($instance['title'])? $instance['title']: esc_html__('write Title here','meetup_one_page');
        $linkone = !empty($instance['linkone'])? $instance['linkone']: esc_html__('Item One','meetup_one_page');
        $linkText = !empty($instance['linkText'])? $instance['linkText']: esc_html__('item Two','meetup_one_page');
        $linkTwo = !empty($instance['linkTwo'])? $instance['linkTwo']: esc_html__('item three','meetup_one_page');
        $linkTwoText = !empty($instance['linkTwoText'])? $instance['linkTwoText']: esc_html__('item four','meetup_one_page');
       
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title','meetup_one_page');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkone')); ?>">
                <?php esc_attr_e('linkone','meetup_one_page');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkone')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkone')); ?>"
                type="text"
                value="<?php echo esc_attr($linkone); ?>">
        </p>
         <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkText')); ?>">
                <?php esc_attr_e('linkText','meetup_one_page');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkText); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>">
                <?php esc_attr_e('linkTwo','meetup_one_page');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwo')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwo')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwo); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>">
                <?php esc_attr_e('linkTwoText','meetup_one_page');?>
            </label>
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('linkTwoText')); ?>"
                name="<?php echo esc_attr($this->get_field_name('linkTwoText')); ?>"
                type="text"
                value="<?php echo esc_attr($linkTwoText); ?>">
        </p>
       

    <?php }
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']))? strip_tags($new_instance['title']):'';
        $instance['linkone'] = (!empty($new_instance['linkone']))? strip_tags($new_instance['linkone']):'';
        $instance['linkText'] = (!empty($new_instance['linkText']))? strip_tags($new_instance['linkText']):'';
        $instance['linkTwo'] = (!empty($new_instance['linkTwo']))? strip_tags($new_instance['linkTwo']):'';
        $instance['linkTwoText'] = (!empty($new_instance['linkTwoText']))? strip_tags($new_instance['linkTwoText']):'';
    
        return $instance;
    }
}


	new meetup_one_page_Sidebars;


