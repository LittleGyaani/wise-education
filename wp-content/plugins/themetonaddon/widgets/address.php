<?php

if (!class_exists('Themeton_Address_Widget')) {
class Themeton_Address_Widget extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'classname' => 'widget_contact', 'description' => esc_html__('Contact Address.', 'themetonaddon') );
        parent::__construct(false, esc_html__(': Address', 'themetonaddon'), $widget_ops);
    }

    function widget($args, $instance) {
        global $post;
        extract($args);
        extract( array_merge(array(
            'title' => '',
            'address' => 'Sydney road, Billboard Street 2219-11C. <br>Apple Town, Your Country.',
            'phone' => '(305) 533-1122, (305) 112-7788',
            'email' => 'johndoe@mail.com',
            'hours' => 'Monday - Friday: <strong>09:00 - 18:00</strong><br>Saturday, Sunday: <strong>Closed</strong>',
            'icon' => '',
        ), $instance));

        print($before_widget);

        if( !empty($title) ){
            echo "" . $args['before_title'] . $title . $args['after_title'];
        }

        $addressmarkup = $address !='' ? "<abbr class='address' title='".esc_attr__('Address', 'themetonaddon')."'><span class='fa fa-location-arrow'></span> $address</abbr>": '';
        $phonemarkup = $phone !='' ? "<abbr title='".esc_attr__('Phone', 'themetonaddon')."'><span class='fa fa-phone'></span> $phone</abbr>": '';
        $emailmarkup = $email !='' ? "<abbr title='".esc_attr__('Email', 'themetonaddon')."'><span class='fa fa-envelope-o'></span> <a href='mailto:$email' class='address_email'>$email</a></abbr>": '';
        $hoursmarkup = $hours !='' ? "<abbr title='".esc_attr__('Work hours', 'themetonaddon')."'><span class='fa fa-clock-o'></span> $hours</abbr>": '';

        if ($icon == '1') {
            $addressmarkup = $address !='' ? "<abbr class='address' title='".esc_attr__('Address', 'themetonaddon')."'>$address</abbr>": '';
            $phonemarkup = $phone !='' ? "<abbr title='".esc_attr__('Phone', 'themetonaddon')."'>$phone</abbr>": '';
            $emailmarkup = $email !='' ? "<abbr title='".esc_attr__('Email', 'themetonaddon')."'><a href='mailto:$email' class='address_email'>$email</a></abbr>": '';
            $hoursmarkup = $hours !='' ? "<abbr title='".esc_attr__('Work hours', 'themetonaddon')."'>$hours</abbr>": '';
        }
        echo sprintf("<address>
                    $addressmarkup
                    $phonemarkup
                    $emailmarkup
                    $hoursmarkup
                </address>");
        print($after_widget);

        wp_reset_postdata();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['address'] = sanitize_text_field($new_instance['address']);
        $instance['phone'] = sanitize_text_field($new_instance['phone']);
        $instance['email'] = sanitize_text_field($new_instance['email']);
        $instance['hours'] = sanitize_text_field($new_instance['hours']);
        $instance['icon'] = sanitize_text_field($new_instance['icon']);

        return $instance;
    }

    function form($instance) {

        //Output admin widget options form
        extract(shortcode_atts(array(
                    'title' => '',
                    'address' => 'Sydney road, Billboard Street 2219-11C. <br>Apple Town, Your Country.',
                    'phone' => '(305) 533-1122, (305) 112-7788',
                    'email' => 'johndoe@mail.com',
                    'hours' => 'Monday - Friday: <strong>09:00 - 18:00</strong><br>Saturday, Sunday: <strong>Closed</strong>',
                    'icon' => '',
                ), $instance));
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e("Title:", 'themetonaddon'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e("Address:", 'themetonaddon'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo esc_attr($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e("Phone:", 'themetonaddon'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" value="<?php echo esc_attr($phone); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e("Email:", 'themetonaddon'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($email); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hours')); ?>"><?php esc_html_e("Work hours:", 'themetonaddon'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('hours')); ?>" name="<?php echo esc_attr($this->get_field_name('hours')); ?>"><?php echo esc_attr($hours); ?></textarea>
        </p>
        <p>
            <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>" value="1">
            <label for="<?php echo esc_attr($this->get_field_id('hours')); ?>"><?php esc_html_e("Hide icons ?", 'themetonaddon'); ?></label>
        </p>
        <?php
    }
}
}

return register_widget("Themeton_Address_Widget");