@extends('app.master')

@section('content')

    <!--begin::Loading Modal-->
    <div class="modal fade" id="loadingPointModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div style="height: 600px!important;" class="modal-dialog modal-lg" role="document">
            <div style="height: 600px!important;" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">انتخاب لوکیشن در نقشه</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
                    <link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
                    <style>
                        #loadingMap { position: absolute; top: 0; bottom: 0; width: 700px; height: 450px }
                    </style>
                    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
                    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css"/>

                    <style>
                        .loadingCoordinates {
                            background: rgba(0, 0, 0, 0.5);
                            color: #fff;
                            position: absolute;
                            bottom: 40px;
                            left: 10px;
                            padding: 5px 10px;
                            margin: 0;
                            font-size: 11px;
                            line-height: 18px;
                            border-radius: 3px;
                            display: none;
                        }
                    </style>

                    <div id="loadingMap"></div>
                    <pre id="loadingCoordinates" class="loadingCoordinates"></pre>

                    <script>
                        mapboxgl.accessToken = 'pk.eyJ1IjoiYWxpaW5qZWN0b3IiLCJhIjoiY2tlcjNxM3ppNDl0dDJ5bHRseGZhazI2NCJ9.dtI471dfmQYQMkBa_j1sCw';
                        mapboxgl.setRTLTextPlugin(
                            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
                            null,
                            true // Lazy load the plugin
                        );
                        var loadingCoordinates = document.getElementById('loadingCoordinates');
                        var loadingMap = new mapboxgl.Map({
                            container: 'loadingMap',
                            style: 'mapbox://styles/mapbox/streets-v11',
                            center: [
                                @php
                                    if(isset($event->lat) && isset($event->long)){
                                      echo "$event->long , $event->lat";
                                    }else{
                                    echo "51.391703","35.708761";
                                    }
                                @endphp

                            ],
                            zoom: 10
                        });

                        loadingMap.addControl(
                            new MapboxGeocoder({
                                accessToken: mapboxgl.accessToken,
                            })
                        );


                        var loadingMarker = new mapboxgl.Marker({
                            draggable: "true",
                        })

                            .setLngLat([
                                @php
                                    if(isset($event->lat) && isset($event->long)){
                                      echo "$event->long , $event->lat";
                                    }else{
                                    echo "51.391703","35.708761";
                                    }
                                @endphp
                            ])
                            .addTo(loadingMap);


                        function onDragEnd() {
                            var loadingLngLat = loadingMarker.getLngLat();
                            loadingCoordinates.style.display = 'block';
                            loadingCoordinates.innerHTML =
                                'Longitude: ' + loadingLngLat.lng + '<br />Latitude: ' + loadingLngLat.lat;
                            document.getElementById('lat').value = loadingLngLat.lat; //latitude
                            document.getElementById('long').value = loadingLngLat.lng; //longitude
                        }

                        loadingMarker.on('dragend', onDragEnd);
                    </script>

                </div>
                <div class="modal-footer">
                    <p style="text-align: center"><button type="button" class="btn btn-success" data-dismiss="modal" >ویرایش لوکیشن</button></p>
                </div>
            </div>
        </div>
    </div>
    <!--end::Loading Modal-->


    <div class="container-fluid">

        <div class="row">
            <div class="col">

                <div class="featured-boxes" style="margin-top:40px;margin-bottom:100px;">
                    <div class="row">
                        <div class="col-md-2">
                            @include('app.panel.menu')
                        </div>
                        <div class="col-md-10">
                            <div class="container-body">
                                <div class="container teamofitMarginTop">
                                    <p class="alert alert-warning teamofitTextAlignRight"> توضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویدادتوضیحات در ارتباط با درج رویداد </p>
                                    <form method="post" enctype="multipart/form-data" action="{{ route('event.update', $event->id) }}" >
                                        @method('PATCH')
                                        @csrf
                                        @if ($errors->any())
                                            <div style="direction: rtl!important; text-align: right" class="alert alert-danger">
                                                <ul style="direction: rtl!important; text-align: right" >
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif


                                        <div class="form-row teamofitMarginTop">

                                            <div class="col">
                                                <select class="form-control" name="team_id">
                                                    @foreach (\App\Team::where('user_id', \Auth::user()->id)->get() as $team)
                                                        <option {{ $event->team_id == $team->id ? 'selected' : '' }} value="{{ $team->id }}">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="gender">
                                                    <option {{ $event->gender == 'آقایان' ? 'selected' : '' }} value="آقایان">آقایان</option>
                                                    <option {{ $event->gender == 'بانوان' ? 'selected' : '' }} value="بانوان">بانوان</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row teamofitMarginTop">

                                            <div class="col">
                                                <input type="text" class="form-control" id="title" value="{{ old('title', $event->title) }}" placeholder="عنوان رویداد" name="title">
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="category_id">
                                                    @foreach (\App\Category::all() as $category)
                                                        <option {{ $event->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input type="number"  class="form-control" id="price" value="{{ old('price', $event->price) }}" placeholder="قیمت رویداد (ریال)" name="price">
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" id="membersCount" value="{{ old('membersCount', $event->membersCount) }}" placeholder="تعداد اعضا" name="membersCount">
                                            </div>
                                        </div>

                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <select class="form-control" name="type">
                                                    <option {{ old('type', $event->type) == "public" ? 'selected' : '' }} value="public">عمومی</option>
                                                    <option {{ old('type', $event->type) == "private" ? 'selected' : '' }} value="private">خصوصی</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="city_id">
                                                    @foreach (\App\City::all() as $city)
                                                        <option {{ $event->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <input placeholder="زمان شروع رویداد" value="{{ $event->timeStart }}" class="form-control dp" >
                                                <input type="hidden" name="timeStart" value="{{ $event->timeStart }}" placeholder="زمان شروع رویداد" class="observer" >
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" id="duration" value="{{ old('duration', $event->duration) }}" placeholder="مدت زمان (دقیقه)" name="duration">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">

                                            <div class="col">
                                                <select class="form-control" name="region">
                                                    <option disabled selected value> -- منطقه را انتخاب نمایید -- </option>
                                                    <option {{ $event->region == 'منطقه 1' ? 'selected' : '' }} value="منطقه 1">منطقه 1</option>
                                                    <option {{ $event->region == 'منطقه 2' ? 'selected' : '' }} value="منطقه 2">منطقه 2</option>
                                                    <option {{ $event->region == 'منطقه 3' ? 'selected' : '' }} value="منطقه 3">منطقه 3</option>
                                                    <option {{ $event->region == 'منطقه 4' ? 'selected' : '' }} value="منطقه 4">منطقه 4</option>
                                                    <option {{ $event->region == 'منطقه 5' ? 'selected' : '' }} value="منطقه 5">منطقه 5</option>
                                                    <option {{ $event->region == 'منطقه 6' ? 'selected' : '' }} value="منطقه 6">منطقه 6</option>
                                                    <option {{ $event->region == 'منطقه 7' ? 'selected' : '' }} value="منطقه 7">منطقه 7</option>
                                                    <option {{ $event->region == 'منطقه 8' ? 'selected' : '' }} value="منطقه 8">منطقه 8</option>
                                                    <option {{ $event->region == 'منطقه 9' ? 'selected' : '' }} value="منطقه 9">منطقه 9</option>
                                                    <option {{ $event->region == 'منطقه 10' ? 'selected' : '' }} value="منطقه 10">منطقه 10</option>
                                                    <option {{ $event->region == 'منطقه 11' ? 'selected' : '' }} value="منطقه 11">منطقه 11</option>
                                                    <option {{ $event->region == 'منطقه 12' ? 'selected' : '' }} value="منطقه 12">منطقه 12</option>
                                                    <option {{ $event->region == 'منطقه 13' ? 'selected' : '' }} value="منطقه 13">منطقه 13</option>
                                                    <option {{ $event->region == 'منطقه 14' ? 'selected' : '' }} value="منطقه 14">منطقه 14</option>
                                                    <option {{ $event->region == 'منطقه 15' ? 'selected' : '' }} value="منطقه 15">منطقه 15</option>
                                                    <option {{ $event->region == 'منطقه 16' ? 'selected' : '' }} value="منطقه 16">منطقه 16</option>
                                                    <option {{ $event->region == 'منطقه 17' ? 'selected' : '' }} value="منطقه 17">منطقه 17</option>
                                                    <option {{ $event->region == 'منطقه 18' ? 'selected' : '' }} value="منطقه 18">منطقه 18</option>
                                                    <option {{ $event->region == 'منطقه 19' ? 'selected' : '' }} value="منطقه 19">منطقه 19</option>
                                                    <option {{ $event->region == 'منطقه 20' ? 'selected' : '' }} value="منطقه 20">منطقه 20</option>
                                                    <option {{ $event->region == 'منطقه 21' ? 'selected' : '' }} value="منطقه 21">منطقه 21</option>
                                                    <option {{ $event->region == 'منطقه 22' ? 'selected' : '' }} value="منطقه 22">منطقه 22</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col">
                                                <input type="text" class="form-control" id="address" placeholder="آدرس" value="{{ old('address', $event->address) }}" name="address">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <textarea name="description" class="form-control" placeholder="توضیحات رویداد ...">{{ old('description', $event->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop">
                                            <div class="col">
                                                <select class="form-control" name="status">
                                                    <option {{ old('status', $event->status) == "در حال برگزاری" ? 'selected' : '' }} value="در حال برگزاری">در حال برگزاری</option>
                                                    <option {{ old('status', $event->status) == "لیست بسته شده" ? 'selected' : '' }} value="لیست بسته شده">لیست بسته شده</option>
                                                    <option {{ old('status', $event->status) == "برگزار شده" ? 'selected' : '' }} value="برگزار شده">برگزار شده</option>
                                                    <option {{ old('status', $event->status) == "لغو شده" ? 'selected' : '' }} value="لغو شده">لغو شده</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop teamofitTextAlignRight">

                                            <div class="col">
                                                <button type="button" class="btn btn-warning mr-3" data-toggle="modal" data-target="#loadingPointModal">ویرایش موقعیت سالن در نقشه</button>
                                                <input name="lat" value="{{ old('lat', $event->lat) }}" type="hidden" id="lat">
                                                <input name="long" value="{{ old('long', $event->long) }}" type="hidden" id="long">
                                            </div>


                                            <div class="col">
                                                <label style="color: white" for="">تصویر را انتخاب نمایید:</label>
                                                <input type="file" name="picture" class="btn btn-warning" value="آپلود تصویر">
                                            </div>
                                        </div>
                                        <div class="form-row teamofitMarginTop teamofitTextAlignRight">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success form-control" value="ویرایش رویداد">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@stop

@section('footerScripts')
    <script>
        $(window).on('shown.bs.modal', function() {
            loadingMap.resize();
            deliveryMap.resize();
        });
    </script>
@stop