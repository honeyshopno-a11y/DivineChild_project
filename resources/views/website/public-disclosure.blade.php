@extends('website.main')
@section('content')



    <!-- InstanceBeginEditable name="slider" -->
    <!-- Page Banner Start -->
    <div class="section page-banner-section">
        <div class="container">
            <div class="page-banner-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-banner text-center">
                            <h2 class="title">Public Disclosure</h2>
                            <ul class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Public Disclosure</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->
    <!-- InstanceEndEditable -->

    <!-- InstanceBeginEditable name="matter" -->
    <!-- About Start -->
    <div class="section upstudy-about-section-04 section-padding-02">
        <div class="container">
            <div class="row">
                @foreach($data as $titleId => $items)

                 <div class="col-lg-12">
                    <div>
                         <h2>{{ $items->first()->title->title }}</h2>
                    </div>
                    <div class="cart-table table-responsive text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">DOCUMENTS AND INFORMATION</th>
                                    <th scope="col">LINKS OF UPLOADED DOCUMENTS IN OUR WEBSITE</th>
                                </tr>
                            </thead>

                            <tbody>
                                  @foreach($items as $key => $item)
                                <tr>
                                     <td>{{ sprintf('%02d', $key + 1) }}</td>
                                    <td class="product-thumbnail">
                                        <p class="text-start">{{ $item->description }}</p>
                                    </td>
                                    <td class="product-name"><a
                                            href="{{ asset($item->pdf) }}"
                                            target="_blank">View</a></td>    
                                </tr>
                                 @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
                


                <!-- <div class="col-lg-12 pt-5">
                    <div>
                        <h2>B : RESULT &amp; ACADEMICS</h2>
                    </div>
                    <div class="cart-table table-responsive text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">DOCUMENTS AND INFORMATION</th>
                                    <th scope="col">LINKS OF UPLOADED DOCUMENTS IN OUR WEBSITE</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="trash">01</td>
                                    <td class="product-thumbnail">
                                        <p class="text-start">FEE STRUCTURE OF THE SCHOOL</p>
                                    </td>
                                    <td class="product-name"><a href="{{ asset('website/pdf/Fees-Structure.pdf')}}"
                                            target="_blank">View</a></td>
                                </tr>

                                <tr>
                                    <td class="trash">02</td>
                                    <td class="product-thumbnail">
                                        <p class="text-start">ANNUAL ACADEMIC CALENDAR</p>
                                    </td>
                                    <td class="product-name"><a href="{{ asset('website/pdf/Acedemic-Calender.pdf')}}"
                                            target="_blank">View</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="trash">03</td>
                                    <td class="product-thumbnail">
                                        <p class="text-start">LIST OF MEMBER OF MANAGEMENT COMMITTEE</p>
                                    </td>
                                    <td class="product-name"><a
                                            href="{{ asset('website/pdf/Member-Of-Management-Committe.pdf')}}"
                                            target="_blank">View</a></td>
                                </tr>

                                <tr>
                                    <td class="trash">04</td>
                                    <td class="product-thumbnail">
                                        <p class="text-start">LIST OF PARENTS TEACHERS ASSOCIATION (PTA) MEMBERS</p>
                                    </td>
                                    <td class="product-name"><a
                                            href="{{ asset('website/pdf/Member-Parents-Association.pdf')}}"
                                            target="_blank">View</a></td>
                                </tr>

                                <tr>
                                    <td class="trash">05</td>
                                    <td class="product-thumbnail">
                                        <p class="text-start">LIST 5 YEAR RESULT OF THE BOARD EXAMINATION AS PER
                                            APPLICABLILITY</p>
                                    </td>
                                    <td class="product-name"><a href="{{ asset('website/pdf/Fifth-Year-Result.pdf')}}"
                                            target="_blank">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div> -->
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- InstanceEndEditable -->



@endsection