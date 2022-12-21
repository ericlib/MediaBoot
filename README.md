## 简介
MediaBoot 是一个Mediawiki的皮肤，基于Bootstrap 5 和 mustache，支持Mediawiki 1.36+。

## 安装
* 下载项目，放置到 skins/ 下
* 修改LocalSettings.php，
```
wfLoadSkin( 'MediaBoot' );
// 设置默认皮肤
$wgDefaultSkin = 'MediaBoot';  
```
## 其他Mediawiki皮肤
* mediawiki-skins-Citizen：https://github.com/StarCitizenTools/mediawiki-skins-Citizen
* mediawiki-bootstrap：https://github.com/blender/mediawiki-bootstrap
* Timeless：https://github.com/wikimedia/mediawiki-skins-Timeless  
* Example：https://github.com/wikimedia/mediawiki-skins-Example 
* Tweeki：https://github.com/thaider/Tweeki

## 了解更多
* mediawiki 皮肤手册：https://www.mediawiki.org/wiki/Manual:Skins
* mediawiki 如何制作皮肤：https://www.mediawiki.org/wiki/Manual:How_to_make_a_MediaWiki_skin