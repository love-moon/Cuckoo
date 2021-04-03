<?php
/**
 * .______    __    __       ___        ______
 * |   _  \  |  |  |  |     /   \      /  __  \
 * |  |_)  | |  |__|  |    /  ^  \    |  |  |  |
 * |   _  <  |   __   |   /  /_\  \   |  |  |  |
 * |  |_)  | |  |  |  |  /  _____  \  |  `--'  |
 * |______/  |__|  |__| /__/     \__\  \______/
 * 
 * Setting
 * 
 * @author Bhao
 * @link https://dwd.moe/
 * @version 1.0.5
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once(__DIR__ ."/settingConfig.php");

function themeConfig($form) {
  themeBackup();
  $config = new Cuckoo_Setting($form);
  echo $config->themePanel();
  $config->form(
    $config->module(
      $config->input('favicon', '网站图标', '在这里填入一个图片 URL 地址, 以加上一个 Favicon图标，没有则不填。').
      $config->input('logoUrl', 'LOGO', '在这里填入一个图片 URL 地址, 以加上一个 LOGO, 此LOGO也展示在侧边栏中。').
      $config->input('describe', '个人描述', '在这里填写个人描述，以在侧边栏显示(若空则自动填充 一言)').
      $config->select('primaryColor', '主题主色', '默认为 Pink',
      ['red'        => 'Red',
      'pink'        => 'Pink',
      'purple'      => 'Purple',
      'deep-purple' => 'Deep Purple',
      'indigo'      => 'Indigo',
      'blue'        => 'Blue',
      'light-blue'  => 'Light Blue',
      'cyan'        => 'Cyan',
      'teal'        => 'Teal',
      'green'       => 'Green',
      'light-green' => 'Light Green',
      'lime'        => 'Lime',
      'yellow'      => 'Yellow',
      'amber'       => 'Amber',
      'orange'      => 'Orange',
      'deep-orange' => 'Deep Orange',
      'brown'       => 'Brown',
      'grey'        => 'Grey',
      'blue-grey'   => 'Blue Grey'
      ], 'pink').
      $config->select('accentColor', '主题强调色', '默认为 Pink',
      ['red'        => 'Red',
      'pink'        => 'Pink',
      'purple'      => 'Purple',
      'deep-purple' => 'Deep Purple',
      'indigo'      => 'Indigo',
      'blue'        => 'Blue',
      'light-blue'  => 'Light Blue',
      'cyan'        => 'Cyan',
      'teal'        => 'Teal',
      'green'       => 'Green',
      'light-green' => 'Light Green',
      'lime'        => 'Lime',
      'yellow'      => 'Yellow',
      'amber'       => 'Amber',
      'orange'      => 'Orange',
      'deep-orange' => 'Deep Orange'
      ], 'pink').
      $config->textarea('drawerContact', '联系方式', '在此填写您的联系方式，最多仅能展示6个。').
      $config->input('bgUrl', '背景图片(电脑)', '在这里填入一个图片 URL 地址, 以设置博客电脑背景图片').
      $config->input('bgphoneUrl', '背景图片(手机)', '在这里填入一个图片 URL 地址, 以设置博客手机背景图片')
    ,1).
    $config->module(
      $config->select('staticFiles', '静态文件源', '推荐选择 “JsDelivr源”',
      ['local'    =>   '本地',
       'jsdelivr' =>   'JsDelivr',
       '9jojo'    =>   '9JOJO',
       'cdn'      =>   '自定义 CDN'
      ],
      'jsdelivr'
      ).$config->input('staticCdn', '自定义静态文件CDN', '在这里填写你自己的CDN(如 api.bhmo.cn)，以获取静态文件(需在上方选择自定义CDN)').
      $config->select('randimg', '随机文章图源', '在这里可以设置随机文章图源，仅当文章没有设置图片时引用。”',
      ['api.ohmyga.cn' =>   'OMGのAPI',
       'local'         =>   '本地',
       'cdn'           =>   '自定义 CDN'
      ],
      'api.ohmyga.cn'
      ).$config->input('randimgCdn', '自定义随机文章图CDN', '在这里填写你自己的CDN(如 api.bhmo.cn)，以获取随机图片(需在上方选择自定义CDN)').
      $config->input('sticky', '置顶文章', '置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔。').
      $config->input('statisticsBaidu', '百度统计', '仅需要输入"https://hm.baidu.com/hm.js?xxxxxx"中的"xxxxxx部分即可"').
      $config->input('beian', '备案号', '无需输入a标签，只需输入备案号即可。').
      $config->textarea('Footer', '底部信息', '在这里填写的信息将在底部显示哦～').
      $config->textarea('otherMenu', '自定义抽屉', '在这里可以自行添加更多的菜单，请遵循JSON语法进行使用。', 
      '[{
        "name":"分类",
        "link":"#",
        "icon":"view_list",
        "type":"2"
       },{
        "name":"归档",
        "link":"#",
        "icon":"access_time",
        "type":"1"
       },{
        "name":"页面",
        "link":"#",
        "icon":"view_carousel",
        "type":"3"
       },{
         "type":"5"
       },{
         "type":"6"
       }]').
      $config->checkbox('qrcode', '跨设备阅读', '默认开启，将会在文章&页面导航栏中显示按钮', ['open' => '默认开启，将会在文章&页面导航栏中显示按钮'], ['open']).
      $config->textarea('textareaBG', '评论框侧边图', '输入图片地址即可，默认为藤原书记哦！').
      $config->textarea('otherCss', '更多CSS', '输入你所想要添加的CS即可哦！').
      $config->textarea('otherJs', '更多JS', '输入你所想要添加的JS即可哦！').
      $config->textarea('brightTime', '定时开/关暗色模式', '填写格式(24H)：开启时间,关闭时间,输出信息 默认为空即为不开启 例: 22,6,深色模式开启').
      $config->textarea('otherPjax', 'PJAX回调', '在这里可以自行添加PJAX回调内容,引号需用“单引号”').
      $config->input('tagCloud', '标签云', '请根据自己所需填写展示数量，输入“0”则不显示标签云', '0').
      $config->textarea('articleCopy', '文章许可协议', '可根据自己所需修改为其他协议',
      '<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh" target="_blank" rel="nofollow">知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议</a>').
      $config->text('<h2>自定义字体</h2>').
      $config->input('fontUrl', '字体CSS链接', '填写即启用了自定义字体功能，不填写仅能使用部分字体').
      $config->input('globalFont', '全局字体', '填写可使用的字体，否则无法显示所填字体').
      $config->input('globalFontWeight', '全局字体粗细', '用于设置全局字体粗细，无需填写全局字体也可以进行设置').
      $config->input('logoFont', 'LOGO字体', '填写可使用的字体，否则无法显示所填字体')
    ,2).
    $config->module(
      $config->isPluginAvailable('Links').
      $config->text('<h2>友链页面</h2>').
      $config->input('linksIndexNum', '主页友链展示个数', '在这里填写主页友链最多展示个数，默认为 0（则不显示），推荐设置为 10 个', 0)
    ,3)
  );
}

function themeBackup(){
  $db = Typecho_Db::get();
  $sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:'.getTheme()));
  $ysj = $sjdq['value'];
  if(isset($_POST['type'])){ 
    if($_POST["type"]=="备份数据"){
      if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:CuckooBackup'))){
        $update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:CuckooBackup');
        $updateRows= $db->query($update);
        echo '<div class="message popup success" style="position: absolute; display: block;">备份已更新，请等待自动刷新！如果等不到请点击 <a href="'.Helper::options()->adminUrl.'options-theme.php">这里</a></div>
              <script language="JavaScript">window.setTimeout("location=\''.Helper::options()->adminUrl.'options-theme.php\'", 2500);</script>';
      }else{
        if($ysj){
          $insert = $db->insert('table.options')->rows(array('name' => 'theme:CuckooBackup','user' => '0','value' => $ysj));
          $insertId = $db->query($insert);
          echo '<div class="message popup success" style="position: absolute; display: block;">备份完成，请等待自动刷新！如果等不到请点击 <a href="'.Helper::options()->adminUrl.'options-theme.php">这里</a></div>
                <script language="JavaScript">window.setTimeout("location=\''.Helper::options()->adminUrl.'options-theme.php\'", 2500);</script>';
        }
      }
    }
    if($_POST["type"]=="还原数据"){
      if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:CuckooBackup'))){
        $sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:CuckooBackup'));
        $bsj = $sjdub['value'];
        $update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:'.getTheme());
        $updateRows= $db->query($update);
        echo '<div class="message popup success" style="position: absolute; display: block;">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击 <a href="'.Helper::options()->adminUrl.'options-theme.php">这里</a></div>
              <script language="JavaScript">window.setTimeout("location=\''.Helper::options()->adminUrl.'options-theme.php\'", 2000);</script>';
      }else{
        echo '<div class="message popup error" style="position: absolute; display: block;" id="del-error">恢复失败，因为你没备份过设置哇（；´д｀）ゞ</div>
              <script language="JavaScript">
              setTimeout( function(){$(\'#del-error\').attr(\'style\', \'display: none;\');}, 2300 );
              </script>';
      }
    }
    if($_POST["type"] == "删除备份"){
      if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:CuckooBackup'))){
        $delete = $db->delete('table.options')->where ('name = ?', 'theme:CuckooBackup');
        $deletedRows = $db->query($delete);
        echo '<div class="message popup success" style="position: absolute; display: block;">删除成功，请等待自动刷新，如果等不到请点击 <a href="'.Helper::options()->adminUrl.'options-theme.php">这里</a></div>
              <script language="JavaScript">window.setTimeout("location=\''.Helper::options()->adminUrl.'options-theme.php\'", 2500);</script>';
      }else{
        echo '<div class="message popup error" style="position: absolute; display: block;" id="del-error">删除失败，检测不到备份ㄟ( ▔, ▔ )ㄏ</div>
              <script language="JavaScript">
              setTimeout( function(){$(\'#del-error\').attr(\'style\', \'display: none;\');}, 2300 );
              </script>';
      }
    }
  }
}
?>