<div id="q-quest" title="{{trans('text.add_q')}}" class="scw-switcher-wrap d-none d-md-block center feature-box fbox-center  fbox-effect fbox-border fbox-dark jello animated" data-animate="jello">
        <div class="fbox-icon">
                <i class="icon-question-sign i-alt"></i>
                </div>

</div>
</div>

 <div id="q-contact_own" class="widget-own own quick-contact-widget form-widget  customjs clearfix scw-switcher-open">
        <button id="close_q" type="button" class="close" data-dismiss="alert">×</button>
@if (Auth::check())
@if(Auth::user()->hasRole('i_user'))
 @if (Auth::user()->hasVerifiedEmail())

 <form id="add_comment-own"  action="{{ route('leave.question',
 [  'locale'=> app()->getLocale()

 ] ) }}"  method="POST">
           @csrf
   <input name='u_id' type='hidden' value='{{Auth::user()->id}}'/>
   <input type="text" name="folder_name" value="questions" hidden>
 <p> <textarea id ='textquest' name="textarea"  class="required sm-form-control input-block-level short-textarea valid" required placeholder="{{trans('text.add_q')}}"></textarea></p>
   <div class="form-group">
        <label><span style="font-size: 11px">{{trans('text.zip')}}</span> </label>
        <input type="file" class="form-control-file"   name="files[]" id="files" multiple>

        </div>
   @if ($message = Session::get('warning_comment'))
   <div class="alert alert-success alert-block fade show">
       <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   <button type='submit'   class="btn btn-secondary">{{trans('text.ask')}}</button>
 </form>
  @else
  <p>{{trans('text.verified_question')}}</p>
  <a href="{{ route('verification.notice',
  [
      'locale'=> app()->getLocale(),
  ] ) }}" class="btn btn-secondary" target="_blank">{{trans('text.verify')}}</a>
 @endif
 @endif
  @else
 <p>{{trans('text.login_for_question')}}</p>
 <a href="{{ route('login', app()->getLocale()) }}" class="btn btn-secondary" target="_blank">{{trans('text.login')}}</a>
 <a href="{{ route('register', app()->getLocale()) }}" class="btn btn-secondary" target="_blank">{{trans('text.register')}}</a>

 @endif

</div>
<script>
var q=document.getElementById('q-quest');
q.addEventListener('click', function(){
   document.getElementById('q-contact_own').style.display='block';
    setTimeout(function(){
        document.getElementById('q-contact_own').style.opacity='1';
    document.getElementById('q-contact_own').style.top='30vh';
    if( document.getElementById("add_comment-own") !== null){
        document.getElementById("add_comment-own").reset();
    }

        },300)

    var c=document.getElementById('close_q');
    setTimeout(function(){

        c.addEventListener('click', function(){
        document.getElementById('q-contact_own').style.top='0vh';
        document.getElementById('q-contact_own').style.opacity='0';
        setTimeout(function(){
        document.getElementById('q-contact_own').style.display='none'
        },300)
    })

    },200)

})


</script>
