<?php
    
use HtmlFormatter\HtmlFormatter;

    
class SkinMediaboot extends SkinMustache {
    
    /**
     * Extends the getTemplateData function to add a template key 'html-myskin-hello-world'
     * which can be rendered in skin.mustache using {{html-myskin-hello-world}}
     
     */
 
    
    
    public function getTemplateData() {
        $data = parent::getTemplateData();
        
        $out = $this->getOutput();
        $title = $out->getTitle();

        #$htmlBodyContent = $out->getHTML();
        #$formatter = new HtmlFormatter( $htmlBodyContent );
        #$doc = $formatter->getDoc();
        // Make top level sections
        #$this->makeSections( $doc, $this->getTopHeadings( $doc ) );
        // Mark subheadings
        #$this->markSubHeadings( $this->getSubHeadings( $doc ) );        
        
        #$new_body = DeToc::ExtractToc($out->getHTML(), $extracted_toc); 
        $new_body = DeToc::ExtractToc($data['html-body-content'], $extracted_toc); 
        $data['page_content'] = $new_body;
        $data['page_toc'] = false;
        if ( $extracted_toc != ""){
            $data['page_toc']['html'] = $extracted_toc; 
        }
        
        #$this->html( 'catlinks' ); 
        
        #导航组合，
        $data['nav_group'] = array_merge( array( $data['data-portlets-sidebar']['data-portlets-first'] ), 
                                          array_values( $data['data-portlets-sidebar']['array-portlets-rest'] ),
                                         array( $data['data-portlets']['data-languages'] ) 
                                        );
        #过滤可能空值的的导航如：data-languages
        $data['nav_group'] = array_filter($data['nav_group']); 
        
        #导航下拉需要添加css='dropdown-item'
        foreach( $data['nav_group'] as &$nav){
            HtmlChange::htmlItemsAddAttributes($nav, 'html-items',
                                               'li', 'css', 'dropdown-item') ;
        
        };
        unset($nav); // 取消地址引用
   
        #页面操作（删除移动保护监视） 
        HtmlChange::htmlItemsAddAttributes($data['data-portlets']['data-actions'], 'html-items',
                                               'li', 'css', 'dropdown-item') ;

        #搜索按钮文本取消
        HtmlChange::htmlItemsAddAttributes($data['data-search-box'], 'html-button-search',
                                               'input', 'value', '') ;        

        
        # 测试变量
         #$data['mydata'] = var_dump($out);

        #$data['mydata'] = empty($data['data-portlets']['data-actions']['html-items']);
        #$data['mydata'] = var_dump($data['data-portlets']['data-actions']['html-items'] );
        #$data['mydata1'] = var_dump($data['data-portlets']['data-personal']['html-items'] );
        #$data['mydata1']  = var_dump($data['html-after-portal'] );
        #$data['mydata1'] = var_dump($data['data-search-box']['html-input'] );
        #$data['mydata1'] = var_dump($data['data-portlets']['data-languages'] );
        #$data['mydata1'] = var_dump($data['data-portlets-sidebar']['data-portlets-first']);
        #$data['mydata2'] = $out->getHTML();
        #$data['split_line'] = '<div> <br \><hr> <br \> </div>';
        
        # 返回数据给muasche模板，不能删除。
        return $data;
    }
};


class HtmlChange {
     
    #一组相同子标签添加设置属性
    # 注意如果输入数组的元素的值为空，会直接将整个数组设置为false。
    public static function htmlItemsAddAttributes (&$array, $html_items, $tag_name, $attribute_name, $attribute_value) {
        
        #判断$array[$html_items]是否为空， 
        
         if ($array[$html_items]  != "" ) {
            $formatter = new HtmlFormatter($array[$html_items]);
            $doc = $formatter->getDoc();
            foreach($doc->getElementsByTagName($tag_name) as $tag) {
                $tag->setAttribute($attribute_name, $attribute_value);

            };
            $array[$html_items]= $formatter->getText(); 
        
        }else {
              $array=false;
            }

 
      }
};
 

 

?>