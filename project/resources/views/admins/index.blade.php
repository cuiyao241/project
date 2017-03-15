@extends('layout.admin')

@section('title','后台的首页')

@section('content')
    
<div class="mws-panel grid_8">
<?php

  $sysos = $_SERVER["SERVER_SOFTWARE"];      //获取服务器标识的字串
  $sysversion = PHP_VERSION;                   //获取PHP服务器版本
  //从服务器中获取GD库的信息
  if(function_exists("gd_info")){                  
  $gd = gd_info();
  $gdinfo = $gd['GD Version'];
  }else {
  $gdinfo = "未知";
  }
  //从GD库中查看是否支持FreeType字体
  $freetype = $gd["FreeType Support"] ? "支持" : "不支持";
  //从PHP配置文件中获得是否可以远程文件获取
  $allowurl= ini_get("allow_url_fopen") ? "支持" : "不支持";
  // //从PHP配置文件中获得最大上传限制
  $max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
  //从PHP配置文件中获得脚本的最大执行时间
  $max_ex_time= ini_get("max_execution_time")."秒";
  //以下两条获取服务器时间，中国大陆采用的是东八区的时间,设置时区写成Etc/GMT-8
  date_default_timezone_set("Etc/GMT-8");
  $systemtime = date("Y-m-d H:i:s",time());

?>
    <div class="mws-panel-header">
        <span><i class="icon-file"></i> 服务器信息</span>
    </div>
      <div class="mws-panel-body no-padding">
          <table class="mws-table">
              <thead>
                  <tr>
                      <th>类别</th>
                      <th>详细信息</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Web服务器：</td>
                      <td><?php echo $sysos; ?> </td>
                   
                  </tr>
                  <tr>
                      <td>PHP版本：</td>
                      <td><?php echo $sysversion; ?></td>
                 
                  </tr>
                  <tr>
                      <td>GD库版本：</td>
                      <td><?php echo $gdinfo; ?></td>
              
                  </tr>
                  <tr>
                      <td>FreeType：</td>
                      <td><?php echo $freetype ?></td>
              
                  </tr>
                 <tr>
                      <td>远程文件获取：</td>
                      <td><?php echo $allowurl ;?></td>
                 </tr>
                <tr>
                      <td>最大上传限制：</td>
                      <td><?php echo $max_ex_time; ?></td>
                 </tr>
                 <tr>
                      <td>最大执行时间</td>
                      <td><?php echo $max_upload; ?></td>
                 </tr>
                 <tr>
                      <td>服务器时间：</td>
                      <td><?php echo $systemtime; ?></td>
                 </tr>
  
              </tbody>
          </table>
      </div>
  </div>
@endsection