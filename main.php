<?php

class AltrujaMain {

  protected $options;

  public function __construct() {

    $this->options = get_option('altruja');

    if (!empty($this->options) && is_array($this->options)) {
      add_action('wp_head', array($this, 'async'));
      add_action('wp_footer', array($this, 'footer'));
    }
  }

  public function async() {
    if (isset($this->options['script'])) {
      echo $this->options['script']."\n";
    } elseif (isset($this->options['async'])) {
      echo '<script>'.$this->options['async'].'</script>'."\n";
    }
  }

  public function footer() {
    if (isset($this->options['link'])) {
      echo $this->options['link'];
    }
  }

}

