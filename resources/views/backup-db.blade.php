@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success backupSucc" style="display: none;">
                            Backup for all databases has been created successfully.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" onclick="backupDB();" id="backup-btn">Backup All Databases</button>
                        <span id="loader" style="display: none;"><img src="{{URL::asset('images/loader.gif')}}">Please wait...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="{{ URL::asset('js/jquery.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    function backupDB()
    {
        $("#loader").show();

        $("#backup-btn").attr('disabled', 'disabled');

        $.ajax({
            url: '{{route('backup.database')}}?s=backup',
            method: 'GET',
            success: function(data) {
                $("#backup-btn").removeAttr('disabled');
                $("#loader").hide();
                $(".backupSucc").show();

                setTimeout(function() {
                    $(".backupSucc").hide();
                },3000);
            }
        });
    }
</script>
