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

## 开发
启动一个名称为wiki的docker容器，挂载MediaBoot到容器skins/MediaBoot中，
```
docker run -d --name wiki -p 8080:80 -v ~/MediaBoot:/var/www/html/skins/MediaBoot mediawiki
```
进入http://127.0.0.1:8080，配置使用并下载好LocalSettings.php文件，修改默认皮肤，并将其复制到容器的html目录中
```
# 修改LocalSettings.php中默认皮肤设置
$wgDefaultSkin = "vector";

# 复制LocalSettings.php到容器html目录
docker cp LocalSettings.php wiki:/var/www/html/
```
刷新http://127.0.0.1:8080，每次修改皮肤后强制刷新即可预览。

## 了解更多
### 制作教程
* mediawiki 皮肤手册：https://www.mediawiki.org/wiki/Manual:Skins
* mediawiki 如何制作皮肤：https://www.mediawiki.org/wiki/Manual:How_to_make_a_MediaWiki_skin

### 其他皮肤
* mediawiki-skins-Citizen：https://github.com/StarCitizenTools/mediawiki-skins-Citizen
* mediawiki-bootstrap：https://github.com/blender/mediawiki-bootstrap
* Timeless：https://github.com/wikimedia/mediawiki-skins-Timeless  
* Example：https://github.com/wikimedia/mediawiki-skins-Example 
* Tweeki：https://github.com/thaider/Tweeki