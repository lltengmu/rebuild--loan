@if (!empty($title_save))
    <div class="modal fade" id="save" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_save}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_save}}</h4>
                </div>
                <div class="modal-footer">
                    <button id="save-btn" class="btn btn-primary btn-sm">Yes</button>
                    <button data-bs-dismiss="modal" class="btn btn-primary btn-sm">No</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (!empty($title_send))
    <div class="modal fade" id="send" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_send}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_send}}</h4>
                </div>
                <div class="modal-footer">
                    <button href="" id="btnyes" class="btn btn-primary btn-sm">Yes</button>
                    <button href="" data-bs-dismiss="modal" class="btn btn-primary btn-sm">No</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (!empty($title_approve))
    <div class="modal fade" id="approve" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_approve}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_approve}}</h4>
                </div>
                <div class="modal-footer">
                    <button href="#" id="approve-btn" class="btn btn-primary btn-sm">Yes</button>
                    <button href="#" data-bs-dismiss="modal" class="btn btn-primary btn-sm">No</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (!empty($title_declined))
    <div class="modal fade" id="declined" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_declined}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_declined}}</h4>
                </div>
                <div class="modal-footer">
                    <button href="" id="declined-btn" class="btn btn-primary btn-sm">Yes</button>
                    <button href="" data-bs-dismiss="modal" class="btn btn-primary btn-sm">No</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (!empty($title_agree))
    <div class="modal fade" id="agree" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_agree}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_agree}}</h4>
                </div>
                <div class="modal-footer">
                    <button href="" id="agree-btn" class="btn btn-primary btn-sm">Yes</button>
                    <button href="" data-bs-dismiss="modal" class="btn btn-primary btn-sm">No</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (!empty($title_withdrawn))
    <div class="modal fade" id="withdrawn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_withdrawn}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_withdrawn}}</h4>
                </div>
                <div class="modal-footer">
                    <button id="withdrawn-btn" class="btn btn-primary btn-sm">Yes</button>
                    <button data-bs-dismiss="modal" class="btn btn-primary btn-sm">No</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (!empty($title_send_consent))
    <div class="modal fade" id="consent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_send_consent}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_send_consent}}</h4>
                    <br>
                    <h6>@lang('Client Mobile'):{{$mobile}}</h6>
                    <h6>@lang('Consent template'):</h6>
                    <textarea class="form-control" rows="5" id="requ" name="requ" maxlength="1000">{{$template->client_template_content}}</textarea>
                </div>
                <div class="modal-footer">
                    <button id="send_consent_btn" class="btn btn-primary btn-sm">@lang('Yes')</button>
                    <button id="send_consent_btn_close" data-bs-dismiss="modal" class="btn btn-primary btn-sm">@lang('No')</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if (!empty($title_counsellor_with))
    <div class="modal fade" id="counwith" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="save" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title_counsellor_with}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$content_coun_with}}</h4> 
                </div>
                <div class="modal-footer">
                    <button id="counsellor_with_btn" class="btn btn-primary btn-sm">@lang('Yes')</button>
                    <button id="counsellor_with_btn_close" data-bs-dismiss="modal" class="btn btn-primary btn-sm">@lang('No')</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if (!empty($default_confirm))
    <div class="modal fade" id="default_confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="default_confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$default_confirm}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{$default_confirm_content}}</h4>
                </div>
                <div class="modal-footer">
                    <button id="default-btn" class="btn btn-primary btn-sm">Yes</button>
                    <button data-bs-dismiss="modal" class="btn btn-primary btn-sm">No</button>
                </div>
            </div>
        </div>
    </div>
@endif
@if (!empty($default_notice))
    <div class="modal fade" id="default_notice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="default_notice" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{ __($default_notice) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>{{ __($default_notice_content) }}</h4>
                </div>
                <div class="modal-footer">

                    <button data-bs-dismiss="modal" class="btn btn-primary btn-sm">@lang('OK')</button>
                </div>
            </div>
        </div>
    </div>
@endif
@section('scripts')
    @parent
    <script>
        $('#approve-btn').click(function () {
            document.getElementById("action").value = "approve";
            $(':button').prop('disabled', true);
            document.getElementById("pending_form").submit();
        });


        $('#declined-btn').click(function () {
            document.getElementById("action").value = "declined";
            $(':button').prop('disabled', true);
            document.getElementById("pending_form").submit();
        });

        $('#agree-btn').click(function () {
            document.getElementById("action").value = "agree";
            $(':button').prop('disabled', true);
            document.getElementById("pending_form").submit();
        });

        $('#withdrawn-btn').click(function () {
            document.getElementById("action").value = "withdrawn";
            $(':button').prop('disabled', true);
            document.getElementById("pending_form").submit();
        });

        $('#btnyes').click(function () {
            document.getElementById("action").value = "send";
            $('form').submit();
        });

        $('#save-btn').click(function () {
            document.getElementById("action").value = "save";
            $(':button').prop('disabled', true);
            $('#toSave').addClass('disabled', true);
            $('form').submit();
        });


        $('#counsellor_with_btn').click(function () {
            document.getElementById("consent_notification").value = document.getElementById("requ").value;
            document.getElementById("action").value = "withdraw";
            $(':button').prop('disabled', true);
            $('form').submit();
        });

        $('#send_consent_btn').click(function () {
            document.getElementById("consent_notification").value = document.getElementById("requ").value;
            document.getElementById("action").value = "send";
            $(':button').prop('disabled', true);
            $('form').submit();
        });
    </script>
@endsection
