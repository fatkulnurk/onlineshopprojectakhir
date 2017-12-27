<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
Class TinyMce{
     
    public function scripttiny_mce($selectcategory=null) {
        return '
         
        <mce:script type="text/javascript" _mce_src="'.base_url().'tiny_mce/tiny_mce_src.js">
        <script type="text/javascript"><!--mce:0--></script>'; 
    }
     
}