

<?php $__env->startSection('title'); ?>
    Management system
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/animate.css/animate.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--**********************************
                                    Nav header end
                                ***********************************-->

    <!--**********************************
                                    Header start
                                ***********************************-->
    <!--**********************************
                                    Header end ti-comment-alt
                                ***********************************-->

    <!--**********************************
                                    Sidebar start
                                <!--**********************************
                                    Sidebar end
                                ***********************************-->

    <!--**********************************
                                    Content body start
                                ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="row col-sm-12" style="position: relative;">
                    <form class="row col-sm-12">
                        <?php echo csrf_field(); ?>
                        <div class="col-sm-1.5">
                            <div class="btn-group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" style="width:160px;padding-left:0px !important;"  data-toggle="dropdown">過濾</button>
                                <div class="dropdown-menu">
                                    <span class="dropdown-item filterByDate" onclick="$('.choose-time').fadeToggle()">通過日期篩選</span>
                                    <span class="dropdown-item filterBySp" onclick="$('.choose-sp').fadeToggle()">通過機構篩選</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 choose-time" style="display: none;">
                            <div class="col-md-12">
                                <div class="example">
                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 choose-sp" style="display:none;">
                            <div class="col-md-12"
                                style="height:35px;padding:5px 10px;display:flex;justify-content:center;align-items:center;border:1px solid rgba(68,37,203);border-radius:5px;"
                                >
                                <label for="" style="margin:0 10px 0 0;">請選擇機構:</label>
                                <div style="margin-top: 3px;">
                                    <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="radio-inline" style="margin: 0 5px 0 5px;">
                                        <input type="checkbox" name="company-<?php echo e($item->company_id); ?>" style="margin: 0 5px 0 0 ;" value="<?php echo e($item->company_id); ?>"><?php echo e($item->name); ?></label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="filterData" class="btn btn-outline-primary" style="position: absolute;right:0;">提交</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Case</div>
                                <div class="stat-digit showCaseCount" style="transition: 1s ease;">
                                    <?php echo e($case); ?>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Person</div>
                                <div class="stat-digit showClientsCount"><?php echo e($client); ?></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">SP(Active)</div>
                                <div class="stat-digit"><?php echo e($sp); ?></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Success case / Reject case</div>
                                <div class="stat-digit">
                                    <?php echo e($compare); ?>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sales Overview</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product Sold</h4>
                            <div class="card-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart py-4">
                                <canvas id="sold-product"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/lib/moment/moment.js"></script>
    <!-- 引入动画 -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/minified/TweenLite.min.js"></script>
    <script type="module">
        import NumberScrollAnimate,{ ArrayDeDuplication } from "<?php echo e(config('app.assets_path')); ?>/assets/js/module/NumberScrolAnimation.js"
        import Message from "<?php echo e(config('app.assets_path')); ?>/assets/js/module/Message.js"
        //实例化一个信息提示对象
        let defaultTime = moment().format("YYYY-MM-DD").replace(/(\d{4})-(\d{2})-(\d{2})/ig,(str,p1,p2,p3) =>`${p2}/${p3}/${p1}`)
        //设置选择时间input元素的默认值
        document.querySelector(`input[name="daterange"]`).value = document.querySelector(`input[name="daterange"]`).value.replace(/(\d{2})-(\d{2})-(\d{4})/ig,defaultTime)
        
        let filterCase = (startTime,endTime) => {
            //定义提交的数据
            let data = {
                startTime,
                endTime,
                companyArray:[]
            }
            //获取需要哪些sp的数据
            document.querySelectorAll(`.choose-sp input`).forEach(item=>{
                if(item.checked){
                    data.companyArray.push(Number(item.value))
                }
            })
            //sp数组去重
            data.companyArray = ArrayDeDuplication(data.companyArray);
            //请求之前确认选择时间的input元素是不是默认值 是默认值则没有被选择
            if(document.querySelector(`input[name="daterange"]`).value == `${defaultTime} - ${defaultTime}`){
                //卸载属性
                delete data.startTime;
                delete data.endTime;
            };
            //当时间和复选框的值都没有改变过的情况下 点击了提交，显示错误提示信息
            if((document.querySelector(`input[name="daterange"]`).value == `${defaultTime} - ${defaultTime}`) && data.companyArray.length == 0){
                //退出函数，不执行请求
                Message('请先选择您的过滤选项!');
                return false;
            };
            //发起请求
            $.ajax({
                type: 'POST',
                data:data,
                url: "<?php echo e(url('api/getDataByfilterCase')); ?>",
                success: function(data) {
                    NumberScrollAnimate('.showCaseCount',data)
                },
                error: function() {
                    alert('调用接口出错了');
                }
            });
        }
        let filterClients = (startTime,endTime) => {
            let data = {
                startTime,
                endTime
            }
            if(document.querySelector(`input[name="daterange"]`).value == `${defaultTime} - ${defaultTime}`){
                return false;
            };
            //发起请求
            $.ajax({
                type: 'POST',
                data:data,
                url: "<?php echo e(url('api/getDataByfilterClients')); ?>",
                success: function(data) {
                    //console.log(data)
                    NumberScrollAnimate('.showClientsCount',data)
                },
                error: function() {
                    alert('调用接口出错了');
                }
            });
        }
        document.querySelector('#filterData').addEventListener('click',function(event){
            //阻止表单提交的默认行为
            event.preventDefault();
            //获取时间范围
            let [ startTime,endTime ] = document.querySelector(`input[name="daterange"]`).value.split('-')
                                        .map(item=>item.match(/\S+/ig)[0])
                                        .map(item=>item.replace(/\//ig,'-'))
                                        .map(item=>item.replace(/(\d{2})-(\d{2})-(\d{4})/ig,(str,p1,p2,p3)=>`${p3}-${p1}-${p2} 00:00:00`))
            //处理结束时间
            endTime = endTime.replace(/\d+:\d+:\d+/ig,'23:59:59');
            //过滤 case                            
            filterCase(startTime,endTime)
            //过滤Clients数据
            filterClients(startTime,endTime)
        })
    </script>
    <script>
        
        var cases = <?php echo json_encode($cases, 15, 512) ?>;
        var allSps = <?php echo json_encode($allSps, 15, 512) ?>;
        //console.log(allSps);

        let Sps = allSps.map(item => {
            return item.first_name;
        });


        //扇形图表数据
        let ownSp = cases.filter(item => {
            return item.service_provider != 0;
        });
        
        let getChartArray = (allSps,cases,ownSp) => {
            let ChartArray = [];
            //console.log(allSps);
            allSps.forEach(item => {
                let singleSp = cases.filter(value => {
                    return value.service_provider == item.company_staff_id;
                }).length;
                ChartArray.push(singleSp)
            });
            return ChartArray.map(item => {
                item = item / ownSp.length * 100
                return item;
            })
        };
        let chartArray = getChartArray(allSps,cases,ownSp)
        let bankCases = cases.filter(item => item.service_provider == 1);
        let hkBankCases = cases.filter(item => item.service_provider == 2);
        //bankCases占比
        //var bankProp = Math.floor(bankCases.length / ownSp.length * 100);
        var bankProp = bankCases.length / ownSp.length * 100;
        //bankCases占比
        //var hkBankProp = Math.ceil(bkBankCases.length / ownSp.length * 100);
        var hkBankProp = hkBankCases.length / ownSp.length * 100;


        //柱状图表数据
        //let time = cases.map(item => ({
        //    Month:item.create_datetime.substr(5,2),
        //    Year:item.create_datetime.substr(0,4),
        //    Unix:Date.parse(item.create_datetime),
        //}));
        //获取到当前时间
        let today = moment().format("YYYY-MM-DD HH:mm:ss");
        //获取年份
        //let { Year,Month } = time.sort((a,b) =>b.Unix - a.Unix)[0];
        let Year = today.substr(0,4);
        
        //获取月份
        let Month = today.substr(5,2);
        
        //动态获取需要渲染的最新的月份
        function getMonth(month,len){
            let monthArray = ["12","11","10","09","08","07","06","05","04","03","02","01"];
            if(month < "05"){ 
                let shortArray = ["04","03","02","01"];
                let shortindex = shortArray.indexOf(month);
                let arr1 = shortArray.splice(shortindex);
                let arr2 = monthArray.splice(0,len-arr1.length);
                return [...arr1,...arr2];
            }
            for (const value of monthArray) {
                if(month == value){
                    let index = monthArray.indexOf(month);
                    return monthArray.splice(index,len);
                }
            }
        }
        let monthData = getMonth(Month,5);
        //复制一份月份队列  不可删除
        let monthData2 = [...monthData];
        //复制一份月份队列  不可删除
        let monthData3 = [...monthData];
       

        ///* 
        //* @return    判断是否跨年展示数据
        //* true 所有月份在同一年
        //* false 不是同一年
        //*/
        function isCrossYear(monthArray){
            
            return monthArray
            .map((item,index,array) => {
                if(index == array.length - 1)return true;
                return array[index] * 1 > array[index + 1] * 1 ? true : false;
            })
            .every(item=> item );
        }

        //数据按月份分类展示
        function getResource(cases,monthArray,Year,allSps) {
            //console.log(Sps);
            let data = {};
            if(isCrossYear(monthArray)){
                monthArray.forEach((item,index) =>{
                    let obj = {};
                    allSps.forEach((i) => {
                        obj[`${i.first_name}`] = cases.filter(value => {
                            return value.create_datetime.substr(0,7) === `${Year}-${item}` && value.service_provider == i.company_staff_id;
                        }).length
                    })
                    data[`Month-${ index + 1 }`] = obj
                });
                return data;
            }else{
                monthArray.forEach((item,i,array) =>{
                    if(i == 0)return;
                    if(++item != array[i - 1]){
                        let lastYearArr = monthArray.splice(i);
                        //console.log(lastYearArr,monthArray);
                        let dataKey = 1;
                        monthArray.forEach((item,index) => {
                            let obj1 = {};
                            allSps.forEach((n) => {
                                obj1[`${n.first_name}`] = cases.filter(value => {
                                    return value.create_datetime.substr(0,7) === `${Year}-${item}` && value.service_provider == n.company_staff_id;
                                }).length
                            })
                            data[`Month-${ dataKey }`] = obj1;
                            dataKey++
                        })
                        lastYearArr.forEach((item,index) => {
                            let obj2 = {};
                            allSps.forEach((n) => {
                                obj2[`${n.first_name}`] = cases.filter(value => {
                                    return value.create_datetime.substr(0,7) === `${Year - 1}-${item}` && value.service_provider == n.company_staff_id;
                                }).length
                            })
                            data[`Month-${ dataKey }`] = obj2;
                            dataKey++;
                        });
                        
                        return false;
                    };
                })
                return data;
                
            }
        }
        let dataSource = getResource(cases,monthData,Year,allSps);


        function getRenderQueue(monthArray,cases,dataSource,allSps){
            let arr = [];

            let letterArray = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n'];
            for (const key in dataSource) {
                arr.push(dataSource[key])
            }
            //console.log(arr);
            let renderArray = monthArray.map((item,index,array) => {
                let obj = {};
                let reIndex = array.length - index;
                let reIndex2 = array.length - index-1;

                obj["y"] = array[reIndex2];

                allSps.forEach((value,i) => {
                    obj[letterArray[i]] = dataSource[`Month-${ reIndex }`][value]
                })
                return obj;
            });
            return {
                renderArray,
                keyArray:letterArray.splice(0,allSps.length),
            }
        }
        let data = getRenderQueue(monthData3,cases,dataSource,Sps);




    (function($,bankProp,hkBankProp,monthData,data,allSps,chartArray) {
        "use strict";
        
    // Morris bar chart
        Morris.Bar({
            element: 'morris-bar-chart',
            data: data.renderArray,
            xkey: 'y',
            ykeys: data.keyArray,
            labels: allSps,
            barColors: ['#343957', '#5873FE','#e67e22'],
            hideHover: 'auto',
            gridLineColor: '#eef0f2',
            resize: true
        });

        $('#info-circle-card').circleProgress({
            value: 0.70,
            size: 100,
            fill: {
                gradient: ["#a389d5"]
            }
        });

        $('.testimonial-widget-one .owl-carousel').owlCarousel({
            singleItem: true,
            loop: true,
            autoplay: false,
            //        rtl: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('#vmap13').vectorMap({
            map: 'usa_en',
            backgroundColor: 'transparent',
            borderColor: 'rgb(88, 115, 254)',
            borderOpacity: 0.25,
            borderWidth: 1,
            color: 'rgb(88, 115, 254)',
            enableZoom: true,
            hoverColor: 'rgba(88, 115, 254)',
            hoverOpacity: null,
            normalizeFunction: 'linear',
            scaleColors: ['#b6d6ff', '#005ace'],
            selectedColor: 'rgba(88, 115, 254, 0.9)',
            selectedRegions: null,
            showTooltip: true,
            // onRegionClick: function(element, code, region) {
            //     var message = 'You clicked "' +
            //         region +
            //         '" which has the code: ' +
            //         code.toUpperCase();

            //     alert(message);
            // }
        });


        var nk = document.getElementById("sold-product");
        // nk.height = 50
        new Chart(nk, {
            type: 'pie',
            data: {
                defaultFontFamily: 'Poppins',
                datasets: [{
                    data: chartArray,
                    borderWidth: 0,
                    backgroundColor: [
                        "rgba(89, 59, 219, .9)",
                        "rgba(89, 59, 219, .7)",
                        "rgba(89, 59, 219, .5)",
                        "rgba(89, 59, 219, .07)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(89, 59, 219, .9)",
                        "rgba(89, 59, 219, .7)",
                        "rgba(89, 59, 219, .5)",
                        "rgba(89, 59, 219, .07)"
                    ]

                }],
                labels: allSps
            },
            options: {
                responsive: true,
                legend: false,
                maintainAspectRatio: false
            }
        });



    })(jQuery,bankProp,hkBankProp,monthData2,data,Sps,chartArray);

(function($) {
    "use strict";

    var data = [],
        totalPoints = 300;

    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);

        // Do a random walk

        while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }

        return res;
    }

    // Set up the control widget

    var updateInterval = 30;
    $("#updateInterval").val(updateInterval).change(function() {
        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            if (updateInterval < 1) {
                updateInterval = 1;
            } else if (updateInterval > 3000) {
                updateInterval = 3000;
            }
            $(this).val("" + updateInterval);
        }
    });

    var plot = $.plot("#cpu-load", [getRandomData()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            show: false
        },
        colors: ["#007BFF"],
        grid: {
            color: "transparent",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }


    });

    function update() {

        plot.setData([getRandomData()]);

        // Since the axes don't change, we don't need to call plot.setupGrid()

        plot.draw();
        setTimeout(update, updateInterval);
    }

    update();


})(jQuery);

    const wt = new PerfectScrollbar('.widget-todo');
    const wtl = new PerfectScrollbar('.widget-timeline');
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\phpEnv\www\localhost\resources\views/individual/list.blade.php ENDPATH**/ ?>