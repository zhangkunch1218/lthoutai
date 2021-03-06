<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">景点管理<small> 景点列表</small></h3>
            <?php echo breadcrumb(array('景点管理', '景点产品', '景点产品添加')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>编辑</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal scenic-base-form" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label"><em>* </em>景点名称</label>
                            <div class="controls">
                                <input type="text" name="scenic_name" class="m-wrap span8 required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>景点特色</label>
                            <div class="controls">
                                <textarea name="special" rows="3" class="m-wrap span8 required"></textarea>
                            </div>
                        </div>
                        <div class="control-group add-pop-up-html">
                            <label class="control-label"><em>* </em>供 应 商</label>
                            <div class="controls">
                                <input type="text" name="supplier_id" class="m-wrap span8 supplieruid required" readonly="readonly" placeholder="双击选择供应商编号">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>景点星级</label>
                            <div class="controls">
                                <select name="star_level" class="m-wrap span8 required">
                                    <?php foreach ($starLevel as $key=>$value) : ?>
                                        <option value="<?php echo $key;?>"><?php echo $value; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>景点主题</label>
                            <div class="controls">
                                <select name="theme_id" class="m-wrap span8 required">
                                    <?php foreach ($scenicTheme as $theme_id=>$value) : ?>
                                        <option value="<?php echo $theme_id;?>"><?php echo $value['theme_name']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>开放时间</label>
                            <div class="controls">
                                <input type="text" name="open_time" class="m-wrap span8 required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>预定须知</label>
                            <div class="controls">
                                <textarea name="notice" rows="5" class="m-wrap span12 required"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>景点简介</label>
                            <div class="controls">
                                <textarea name="info" rows="5" class="m-wrap span12 required"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">交通指南</label>
                            <div class="controls">
                                <textarea name="traffic" rows="5" class="m-wrap span12"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">注意事项</label>
                            <div class="controls">
                                <textarea name="attention" rows="5" class="m-wrap span12"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>景区地址</label>
                            <div class="controls">
                                <?php $this->load->view('commonhtml/districtSelect'); ?>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>详细地址</label>
                            <div class="controls">
                                <input type="text" name="address" class="m-wrap span8 required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>地图类型</label>
                            <div class="controls">
                                <label class="radio">
                                    <input type="radio" name="locType" value="1" checked="checked"> 百度地图
                                </label>
                                <label class="radio">
                                    <input type="radio" name="locType" value="2"> 高德地图
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>经度</label>
                            <div class="controls">
                                <input type="text" name="longitude" class="m-wrap span8 number required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>纬度</label>
                            <div class="controls">
                                <input type="text" name="latitude" class="m-wrap span8 number required">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>状态</label>
                            <div class="controls">
                                <label class="radio">
                                    <input type="radio" name="updown" value="1" checked="checked"> 上架
                                </label>
                                <label class="radio">
                                    <input type="radio" name="updown" value="2"> 下架
                                </label>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn green"><i class="icon-ok"></i> 保存</button>
                            <a href="<?php echo base_url('scenic_base/grid') ?>">
                                <button class="btn" type="button">返回</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer');?>
<?php $this->load->view('supplier/ajaxSupplier/ajaxGet');?>
<script type="text/javascript">
$(document).ready(function(){
    // 提交验证
    $('form.scenic-base-form').submit(function () {
        return false;
    }).validate({
        ignore: '',
        submitHandler: function (f) {
            $.ajax({
                type: 'post',
                async: true,
                dataType: 'json',
                url: hostUrl() + '/scenic_base/ajaxValidate',
                data: $('form.scenic-base-form').serialize(),
                beforeSend: function () {
                    $('.form-actions [type=submit]').text('加载中');
                },
                success: function (data) {
                    if (data.status) {
                        $('.alert-error').hide();
                        window.location.href = data.messages;
                    } else {
                        $('.alert-error').show();
                        $('.alert-error .remove_2 p').html(data.messages);
                        $('.footer .go-top').trigger('click');
                    }
                }
            });
        }
    });
});
</script>