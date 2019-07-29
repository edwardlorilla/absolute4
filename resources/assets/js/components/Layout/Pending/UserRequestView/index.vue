<template>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills justify-content-center">
                <li v-if="$root.store.state.can.user" class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'view.medicine.request' }">User Requests
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'pending.medicine.request' }">Request Medicine
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'pending.supply.request' }">Request Supply
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'pending.office-supply.request' }">Request Office
                        Supply
                    </router-link>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <router-view/>
        </div>
    </div>
</template>
