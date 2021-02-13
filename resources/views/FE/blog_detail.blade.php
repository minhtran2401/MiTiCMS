@extends('FE.layout')
<title>@yield('pagetitle','MiTi-Dịch Vụ Mạng')</title>
@section('content')
<div class="page-wrapper">
    <div class="content">
             <div class="col-lg-12 col-md-12 ftco-animate fadeInUp ftco-animated">
                                <div class="card ">
                                    <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h4 class="page-title">Chi tiết blog</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="blog-view">
                                                            <article class="blog blog-single-post">
                                                                <h3 class="blog-title">{{$blog['blog_name']}}</h3>
                                                                <div class="blog-info clearfix">
                                                                    <div class="post-left">
                                                                        <ul>
                                                                            <li><a href="#."><i class="fa fa-calendar"></i> <span>{{date('d-m-Y', strtotime($blog['blog_post_time']))}}</span></a></li>
                                                                            <li><a href="#."><i class="fa fa-user-o"></i> <span>
                                                                                @php
                                                                                $id=$blog['user_id'];
                                                                                $user = \App\Models\User::find($id);
                                                                                $name =$user->name;
                                                                                @endphp
                                                                                {{$name}}</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="post-right"><a href="#."><i class="fa fa-eye"></i>{{$blog['blog_view']}} Lượt xem</a></div>
                                                                </div>
                                                                <div class="blog-image">
                                                                    <a href="#."><img alt="" src="{{asset('image')}}/{{$blog['blog_image']}}" class="img-fluid"></a>
                                                                </div>
                                                                <div class="blog-content">
                                                                   {!!$blog['blog_content']!!}
                                                                </div>
                                                            </article>
                                                         
                                                        </div>
                                                    </div>
                                                    <aside class="col-md-4">
                                                        @php
                                                        $blog= DB::table('blog')->where('display','1')->orderby('blog_id','desc')->limit(3)->get();
                                                      @endphp
                                                        <div class="widget post-widget">
                                                            <h5>Bài viết mới nhất</h5>
                                                            <ul class="latest-posts">
                                                                @foreach ($blog as $b)
                                                                    <li>
                                                                    <div class="post-thumb">
                                                                        <a href="{{route('blog_detail',$b->slug)}}">
                                                                            <img class="img-fluid" src="{{asset('image')}}/{{$b->blog_image}}" alt="{{$b->blog_name}}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-info">
                                                                        <h4>
                                                                            <a href="{{route('blog_detail',$b->slug)}}">{!!$b->blog_summary!!}</a>
                                                                        </h4>
                                                                        <p><i aria-hidden="true" class="fa fa-calendar"></i>{{date('d-m-Y', strtotime($b->blog_name))}}</p>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                
                                                             
                                                            </ul>
                                                        </div>
                                                      
                                                        <div class="widget tags-widget">
                                                            <h5>Tags</h5>
                                                            <?php
                                                            $tags = $b->blog_tag;
                                                            $arr = explode(", ",  $tags);
                                                            ?>
                                                            <ul class="tags">
                                                                @foreach ($arr as $t)
                                                                <li><a href="#." class="tag">{{$t}}</a></li>
                                                                    
                                                                        @endforeach
                                                               
                                                            </ul>
                                                        </div>
                                                    </aside>
                                                </div>
                                            </div>
                                  
                            </div>
                        </div>
                    </div>
                                        @endsection