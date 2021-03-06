<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">

                        <div class="clearfix"></div>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>فرم درخواست کالا</h6>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">تنظیمات 1</a>
                                                    </li>
                                                    <li><a href="#">تنظیمات 2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">


                                        <!-- Smart Wizard -->
                                        <p>میتوانید کالا های تخصصی خود را از این قسمت درخواست کنید</p>
                                        <div id="wizard" class="form_wizard wizard_horizontal">
                                            <ul class="wizard_steps">
                                                <li>
                                                    <a href="#step-1">
                                                        <span class="step_no">1</span>
                                                        <span class="step_descr">
                                              قدم اول<br/>
                                              <small>انتخاب دسته بندی</small>
                                          </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-2">
                                                        <span class="step_no">2</span>
                                                        <span class="step_descr">
                                              قدم دوم<br/>
                                              <small>انتخاب محصول</small>
                                          </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-3">
                                                        <span class="step_no">3</span>
                                                        <span class="step_descr">
                                              قدم سوم<br/>
                                              <small>بارگزاری پیوست</small>
                                          </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-4">
                                                        <span class="step_no">4</span>
                                                        <span class="step_descr">
                                              قدم چهارم<br/>
                                              <small>توضیحات قدم چهارم</small>
                                          </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="step-1">
                                                <form class="form-horizontal form-label-left">
                                                    <h6>در این مرحله دسته بندی را انتخاب نمایید و به مرحله بعد بروید</h6>
                                                    @include('orders.wizard-step1')
                                                </form>

                                            </div>
                                            <div id="step-2">
                                                <div class="row">
                                                    <div class="container">
                                                        <h6 class="StepTitle">در این مرحله محصولات مورد نظر را انتخاب کنید</h6>
                                                    </div>
                                                </div>
                                                @include('orders.wizard-step2')
                                                <p>بعد از انتخاب تجهیزات مورد نظر میتوانید در سبد تجهیزات
                                                    منتخب میتوانید ببیند که چه کالاهایی را انتخاب نمودید
                                                    تجهیزات انتخاب شده را میتوانید در صورتی که تعدادی از یک تجهیز
                                                    میخواهید باید در قدم چهارم انتخاب کنید
                                                </p>

                                            </div>
                                            <div id="step-3">
                                                <h6 class="StepTitle">محتوای قدم سوم</h6>
                                                @include('orders.wizard-step3')

                                            </div>
                                            <div id="step-4">
                                                <h6 class="StepTitle">محتوی قدم چهارم</h6>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
                                                    می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                                                    الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این
                                                    صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و
                                                    شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای
                                                    اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                                                    استفاده قرار گیرد.

                                                </p>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
                                                    می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                                                    الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این
                                                    صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و
                                                    شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای
                                                    اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                                                    استفاده قرار گیرد.

                                                </p>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                                    استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
                                                    ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی
                                                    در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
                                                    می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                                                    الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این
                                                    صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و
                                                    شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای
                                                    اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                                                    استفاده قرار گیرد.

                                                </p>
                                            </div>

                                        </div>
                                        <!-- End SmartWizard Content -->


                                        <!-- Tabs -->
                                        <!-- End SmartWizard Content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<!-- /page content -->--}}
                {{--<div class="pull-left mr-3" dir="ltr">--}}

                    {{--@include('coreui-templates::common.paginate', ['records' => $orders])--}}

                {{--</div>--}}

            </div>
        </div>
    </div>
</div>

</div>
