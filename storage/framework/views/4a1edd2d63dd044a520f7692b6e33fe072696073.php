

<?php $__env->startSection('title'); ?>
    Management system
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>歡迎回來！</h4>
                        <span class="ml-1">貸款管理模板</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">貸款管理模板</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">貸款管理模板</h4>
                        </div>
                        <form action="<?php echo e(route('image.upload.post')); ?>" method="POST" enctype="multipart/form-data"
                            style="margin: 0 20%">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="basic-form" style="text-align: center">
                                    <input type="text" name="id" value="<?php echo e($imagesrc[0]->id); ?>" style="display: none">
                                    <div class="form-group">
                                        <img id="uploadPreview"
                                            src="<?php echo e(config('app.assets_path')); ?><?php echo e($imagesrc[0]->template_photo); ?>"
                                            alt="" style="max-height: 300px;" />
                                    </div>
                                    <input id="uploadImage" style="display: none;" type="file" name="image"
                                        accept="image/gif,image/jpeg,image/jpg,image/png,image/svg" value="" />
                                    <button type="button" class="btn btn-rounded btn-outline-primary mt-4"
                                        onclick="imgbtn()">上載圖片
                                    </button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" style="display:block;text-align: center">
                                    <h4 class="card-title">文本區域</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <textarea name="template_text" class="form-control" rows="4"
                                                id="comment"><?php echo e($imagesrc[0]->template_text); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button id="EditOnclick" type="submit" class="btn btn-primary">確認</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div id="alertinfo" style="width:500px;position:fixed;top:80px;left:82%;z-index:999;display:none">
            <div id="alertinfo1" class="alert alert-success"><strong id="changeText1">成功!</strong>&nbsp;&nbsp;<span
                    id="changeText">修改成功.</span></div>
        </div>
    </div>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/jQuery3.6.0.js"></script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/js/jquery.dataTables.min.js">
    </script>
    <script>
        function func() {
            return false;
        }

        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000)
            }, 3000)
        }
        $("#uploadImage").on("change", function() {
            // Get a reference to the fileList
            var files = !!this.files ? this.files : [];

            // If no files were selected, or no FileReader support, return
            if (!files.length || !window.FileReader) return;

            // Only proceed if the selected file is an image
            if (/^image/.test(files[0].type)) {

                // Create a new instance of the FileReader
                var reader = new FileReader();

                // Read the local file as a DataURL
                reader.readAsDataURL(files[0]);

                // When loaded, set image data as background of div
                reader.onloadend = function() {

                    $("#uploadPreview").attr("src", this.result);

                }
            }
        });


        function imgbtn() {

            $('#uploadImage').click();

        }

        $('#uploadImage').change(function(e) {
            var fileMsg = e.currentTarget.files;

            // console.log(fileMsg);

            var fileName = fileMsg[0].name;

            // console.log(fileName);
            // console.log(fileName.split('.')); //js-dom.png.split('@')

            var type = fileName.split('.')[1];

            if (type !== "gif" && type !== "jpeg" && type !== "jpg" && type !== "png" && type !== "svg") {

                console.log('格式错误');
                return false;

            }

            $('#template_photo').val(fileName);

        })
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\phpEnv\www\localhost\resources\views/individual/loan_template.blade.php ENDPATH**/ ?>