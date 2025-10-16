@extends('welcome')

<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded-4">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>لوحة التحكم</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

