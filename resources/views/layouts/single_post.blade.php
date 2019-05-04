<html dir="ltr" lang="en-US">
    <head>
        <title>InfoCheck</title>
        @include('../includes.links' )
      </head>
<body class="stretched device-xl no-transition">
            @include('../includes.mini_menu_for_posts' )
            @include('../includes.main_menu' )

<section id="content">
    <div class="content-wrap">





            <div class="container clearfix">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shortcodes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forms</li>
                    </ol>
            </div>

            {{-- {{dd($data['post'][0]['id'])}} --}}

        <div class="container clearfix margin-top-25">




            <div class="postcontent nobottommargin clearfix">
                <div class="single-post nobottommargin">
                        <div class="entry clearfix">
                                <div class="entry-title">
                                <h2>{{$data['post'][0]->title}}</h2>
                                </div>
                                <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{$data['post'][0]->date}}</li>
                                </ul>
                                <div class="entry-image">
                                <a href="#"><img src="/images/services/1.jpg" alt="Blog Single"></a>
                                </div>
                                <div class="entry-content notopmargin">
                                    <div>
                                            {{$data['post'][0]->html_code}}

                                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. <a href="#">Curabitur blandit tempus porttitor</a>. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.</p>
                                        <blockquote><p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper.</p></blockquote>
                                        <p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum. Donec id elit non mi porta gravida at eget metus.</p>
                                        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. <a href="#">Nullam quis risus eget urna</a> mollis ornare vel eu leo. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

                                    </div>
                            <div class="tagcloud clearfix bottommargin">
                                    @isset($data['docs'])
                                    <p style="color:crimson"> {{count($data['docs'])>0?trans('text.hodvac'):''}}</p>
                                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                                            @forelse ($data['docs'] as $item)
                                                    <div class="tag-cloud" >
                                                    <a href="{{$item->link}}" download title="{{$item->type}}">
                                                        <img width="12" src="/images/icons/download.png" >
                                                        {{$item->name}}
                                                    </a>
                                                    </div>
                                                   @empty
                                            @endforelse
                                    </div>
                                    @endisset
                            </div>
                            @isset($data['post_tags'])
                                        <div class="tagcloud clearfix bottommargin">
                                            @for ($i = 0; $i < count($data['post_tags']); $i++)
                                            <a href="{{url(app()->getLocale().'/tags/'.$data['post_tags'][$i])}}"> {{$data['post_tags'][$i]}}</a>
                                            @endfor
                                        </div>
                            @endisset
                                        <div class="clear"></div>

                                        <div class="si-share noborder clearfix">
                                        {{-- <span>{{trans('text.hodvac')}}</span> --}}
                                        <div>
                                        <a href="#" class="social-icon si-borderless si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-pinterest">
                                        <i class="icon-pinterest"></i>
                                        <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-rss">
                                        <i class="icon-rss"></i>
                                        <i class="icon-rss"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email3"></i>
                                        </a>
                                        </div>
                                        </div>
                                </div>
                        </div>

                    <div id="comments" class="clearfix">
                            <h3 id="comments-title" style="display:{{count($data['comments'])>0?'block':'none'}}" >{{trans('text.comments')}}</h3>
                        @isset($data['comments'])


                            <ol class="commentlist clearfix" style="display:{{count($data['comments'])>0?'block':'none'}}">
                              @for ($i = 0; $i < count($data['comments']); $i++)
                                <li class="comment even thread-even depth-1" id="li-comment-1">
                                    <div id="comment-1" class="comment-wrap clearfix">
                                    <div class="comment-meta">
                                    <div class="comment-author vcard">
                                    <span class="comment-avatar clearfix">
                                    <img alt="" src="http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60" class="avatar avatar-60 photo avatar-default" height="60" width="60"></span>
                                    </div>
                                    </div>
                                    <div class="comment-content clearfix">
                                    <div class="comment-author">{{$data['comments'][$i]->name}}<span> {{$data['comments'][$i]->created_at}}</span></div>
                                    <p>{{$data['comments'][$i]->body}}</p>

                                    </div>
                                    <div class="clear"></div>
                                    </div>
                                    <ul class="children">
                                    <li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">

                                    </li>
                                    </ul>
                                </li>
                                @endfor
                            </ol>
                          @if (Auth::check())
                               @if(Auth::user()->hasRole('i_user'))
                                @if (Auth::user()->hasVerifiedEmail())

                                <form id="add_comment" action="{{ route('single_post.add_comment',
                                [  'locale'=> app()->getLocale(),
                                    $data['post'][0]['id']
                                ] ) }}"  method="POST">
                                          @csrf
                                          <input name='u_id' type='hidden' value='{{Auth::user()->id}}'/>
                                  <p> <textarea id ='textar' name="textarea" class="required sm-form-control input-block-level short-textarea valid" required placeholder="Add comment..."></textarea></p>

                                  @if ($message = Session::get('warning_comment'))
                                  <div class="alert alert-success alert-block fade show">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                          <strong>{{ $message }}</strong>
                                  </div>
                                  @endif
                                  <button type='submit' class="btn btn-secondary">{{trans('text.leave_comment')}}</button>
                                </form>
                                 @else
                                 <p>{{trans('text.verified')}}</p>
                                 <a href="{{ route('verification.notice',
                                 [
                                     'locale'=> app()->getLocale(),
                                 ] ) }}" class="btn btn-secondary" target="_blank">{{trans('text.verify')}}</a>
                                @endif
                                @endif
                                 @else
                                <p>{{trans('text.login_for_comment')}}</p>
                                <a href="{{ route('login', app()->getLocale()) }}" class="btn btn-secondary" target="_blank">{{trans('text.login')}}</a>
                                <a href="{{ route('register', app()->getLocale()) }}" class="btn btn-secondary" target="_blank">{{trans('text.register')}}</a>

                                @endif

                            @endisset
                        </div>
                     </div>
            </div>

                    <div class="sidebar nobottommargin col_last widget_links">
                        <div  class="widget clearfix">
                            @include('../includes.most_viewed')
                        </div>
                                <div class="widget clearfix">
                                        @include('../includes.all_tags')
                                </div>
                    </div>
         </div>
      </div>
     </section>

     <section id="page-title">
            @if (count($data['the_same_posts'])>0)
            <?php $limit=0; ?>
          <div class="container clearfix mt-5">
                      <h3 class="h3_omg">{{trans('text.same_posts')}}</h3>
                      <div class="line line_omg"></div>
                 @for ($i = 0; $i < count($data['the_same_posts']); $i++)
                     <?php $limit++; ?>
                     @if ($limit<=3)
                     <div class="col_one_third nobottommargin">
                             <div class="feature-box media-box">
                                 <div class="fbox-media">
                        <a href="{{url(app()->getLocale().'/posts/'.$data['the_same_posts'][$i]->unique_id.'/'.urlencode($data['the_same_posts'][$i]->title))}}">
                                     <img class="image_fade" id="{{$data['the_same_posts'][$i]->id}}" src="{{$data['the_same_posts'][$i]->img}}" alt="Image">
                        </a>
                                 </div>
                                 <div class="fbox-desc">
                                        <a class="own-link-aa{{$data['the_same_posts'][$i]->id}}"  href="{{url(app()->getLocale().'/posts/'.$data['the_same_posts'][$i]->unique_id.'/'.urlencode($data['the_same_posts'][$i]->title))}}">
                                                <h3>{{$data['the_same_posts'][$i]->title}}</h3>
                                                <p>{!!str_limit($data['the_same_posts'][$i]->short_text , 60)!!} </p>
                                              </a>
                                     <ul class="entry-meta clearfix">
                                         <li><i class="icon-calendar3"> </i> {{ $data['the_same_posts'][$i]->date }}</li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     @endif
                 @endfor
          @endif


    </section>
     @include('../includes.footer')
    </div>
    <div id="gotoTop" class="icon-angle-up"></div>
  @include('../includes.scripts')

<script>
     $('#textar').val('');
</script>

</body>
</html>
