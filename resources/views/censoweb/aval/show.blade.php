@extends('layouts.blank')

@section('htmlheader_title')
Comuneros
@stop

@push('stylesheets')
<!-- Example -->

@endpush


@section('main_container')
<div class="right_col" role="main">

  <div class="">
    
  <div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel" style="border: none; margin-top: 0px" >
      <div class="x_title" style="border: none"></div>
      <div class="x_content">
        {{--  --}}
        <div class="row">
          <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                        <p>Account Details</p>
                    </div>
                    
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                        <p>Career</p>
                    </div>
                    
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                        <p>Social Media</p>
                    </div>
                    
                </div>
            </div>
        </div>


      {{-- ------------------ --}}

      <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Account Details</h3>
                            <!-- content go here -->
                            <button class="btn btn-light btn-block nextBtn pull-right" type="button" >Next</button>
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Career</h3>
                            <!-- content go here -->
                            <button class="btn btn-light btn-block nextBtn pull-right" type="button" >Next</button>
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Social Media</h3>
                            <!-- content go here -->
                            <button class="btn btn-light nextBtn btn-block pull-right" type="submit">Finish!</button>
                        </div>
                    </div>
               </div>

      </div>
    </div>
  </div>
   
  </div>
</div>
@stop
<script>
<script type="text/javascript">
$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'), // tab nav items
            allWells = $('.setup-content'), // content div
            allNextBtn = $('.nextBtn'); // next button

    allWells.hide(); // hide all contents by defauld

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    // next button
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='email'],input[type='password'],input[type='url']"),
            isValid = true;
           // Validation
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        // move to next step if valid
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>

</script>
