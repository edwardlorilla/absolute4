<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="m-0">{{$route.meta.type}} {{$route.meta.title}} Medicine</h5>
                </div>
                <div class="card-body">
                    <router-view/>
                </div>
            </div>
        </div>
    </div>
</template>