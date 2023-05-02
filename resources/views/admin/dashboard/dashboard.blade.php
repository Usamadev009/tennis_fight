@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row pt-4">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="31.279" viewBox="0 0 40 31.279">
                                <g id="sales" transform="translate(0 -55.784)">
                                    <g id="Group_2562" data-name="Group 2562" transform="translate(0 63.265)">
                                    <path id="Path_1291" data-name="Path 1291" d="M38.826,172.947H36.462V157.311a1.173,1.173,0,0,0-1.174-1.172H28.8a1.173,1.173,0,0,0-1.174,1.172v15.636H24.417V152.665a1.173,1.173,0,0,0-1.174-1.172H16.758a1.173,1.173,0,0,0-1.174,1.172v20.281H12.372V156.07A1.173,1.173,0,0,0,11.2,154.9H4.713a1.173,1.173,0,0,0-1.174,1.172v16.877H1.174a1.172,1.172,0,1,0,0,2.345H38.826a1.172,1.172,0,1,0,0-2.345Zm-32.938,0v-15.7h4.136v15.7Zm12.045,0V153.838h4.136v19.109Zm12.045,0V158.483h4.136v14.463Z" transform="translate(0 -151.493)" fill="#fff"/>
                                    </g>
                                    <path id="Path_1292" data-name="Path 1292" d="M46.519,60.245a1.174,1.174,0,0,0-.9-1.244l-3.788-.921a1.172,1.172,0,1,0-.554,2.278l1.071.26-3.037,1.874L27.795,55.937a1.172,1.172,0,0,0-1.078-.042L15.269,61.268,9.8,57.853a1.172,1.172,0,1,0-1.241,1.989L14.569,63.6a1.172,1.172,0,0,0,1.119.067l11.475-5.386,11.592,6.6a1.21,1.21,0,0,0,1.2-.021l3.682-2.272-.245,1.148a1.173,1.173,0,0,0,2.293.49l.813-3.806a1.35,1.35,0,0,0,.026-.169Z" transform="translate(-7.378)" fill="#fff"/>
                                </g>
                            </svg>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span>
                            <span class="info-box-number">{{ $users }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="31.279" viewBox="0 0 40 31.279">
                                <g id="sales" transform="translate(0 -55.784)">
                                    <g id="Group_2562" data-name="Group 2562" transform="translate(0 63.265)">
                                    <path id="Path_1291" data-name="Path 1291" d="M38.826,172.947H36.462V157.311a1.173,1.173,0,0,0-1.174-1.172H28.8a1.173,1.173,0,0,0-1.174,1.172v15.636H24.417V152.665a1.173,1.173,0,0,0-1.174-1.172H16.758a1.173,1.173,0,0,0-1.174,1.172v20.281H12.372V156.07A1.173,1.173,0,0,0,11.2,154.9H4.713a1.173,1.173,0,0,0-1.174,1.172v16.877H1.174a1.172,1.172,0,1,0,0,2.345H38.826a1.172,1.172,0,1,0,0-2.345Zm-32.938,0v-15.7h4.136v15.7Zm12.045,0V153.838h4.136v19.109Zm12.045,0V158.483h4.136v14.463Z" transform="translate(0 -151.493)" fill="#fff"/>
                                    </g>
                                    <path id="Path_1292" data-name="Path 1292" d="M46.519,60.245a1.174,1.174,0,0,0-.9-1.244l-3.788-.921a1.172,1.172,0,1,0-.554,2.278l1.071.26-3.037,1.874L27.795,55.937a1.172,1.172,0,0,0-1.078-.042L15.269,61.268,9.8,57.853a1.172,1.172,0,1,0-1.241,1.989L14.569,63.6a1.172,1.172,0,0,0,1.119.067l11.475-5.386,11.592,6.6a1.21,1.21,0,0,0,1.2-.021l3.682-2.272-.245,1.148a1.173,1.173,0,0,0,2.293.49l.813-3.806a1.35,1.35,0,0,0,.026-.169Z" transform="translate(-7.378)" fill="#fff"/>
                                </g>
                            </svg>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Season Sales</span>
                            <span class="info-box-number">$30008.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <g id="user" transform="translate(0)">
                                    <g id="Group_2572" data-name="Group 2572" transform="translate(0)">
                                        <path id="Path_1302" data-name="Path 1302" d="M29.924,25.706a1.172,1.172,0,0,0-2.295.478,1.225,1.225,0,0,1-.248,1.027,1.191,1.191,0,0,1-.937.446H3.557a1.191,1.191,0,0,1-.937-.446,1.224,1.224,0,0,1-.248-1.027A12.948,12.948,0,0,1,14.69,15.932q.155.006.311.006t.312-.006a12.892,12.892,0,0,1,10.411,5.722,1.172,1.172,0,1,0,1.947-1.305,15.243,15.243,0,0,0-7.9-6,7.969,7.969,0,1,0-9.539,0A15.242,15.242,0,0,0,.076,25.706,3.56,3.56,0,0,0,3.557,30H26.444a3.56,3.56,0,0,0,3.48-4.294ZM9.375,7.969a5.625,5.625,0,1,1,5.91,5.618l-.285,0-.284,0A5.632,5.632,0,0,1,9.375,7.969Z" transform="translate(0)" fill="#fff"/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Paid Players</span>
                            <span class="info-box-number">511</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box shadow-none">
                        <span class="info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <g id="user" transform="translate(0)">
                                    <g id="Group_2572" data-name="Group 2572" transform="translate(0)">
                                        <path id="Path_1302" data-name="Path 1302" d="M29.924,25.706a1.172,1.172,0,0,0-2.295.478,1.225,1.225,0,0,1-.248,1.027,1.191,1.191,0,0,1-.937.446H3.557a1.191,1.191,0,0,1-.937-.446,1.224,1.224,0,0,1-.248-1.027A12.948,12.948,0,0,1,14.69,15.932q.155.006.311.006t.312-.006a12.892,12.892,0,0,1,10.411,5.722,1.172,1.172,0,1,0,1.947-1.305,15.243,15.243,0,0,0-7.9-6,7.969,7.969,0,1,0-9.539,0A15.242,15.242,0,0,0,.076,25.706,3.56,3.56,0,0,0,3.557,30H26.444a3.56,3.56,0,0,0,3.48-4.294ZM9.375,7.969a5.625,5.625,0,1,1,5.91,5.618l-.285,0-.284,0A5.632,5.632,0,0,1,9.375,7.969Z" transform="translate(0)" fill="#fff"/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Support Requests</span>
                            <span class="info-box-number">500</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
