<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Orders</div>

            <div class="card-body">
                <form action="./api/order" method="post">
                @csrf
                    <div class="form-group row">
                        <div class="col-lg-8">
                            <label>Order Name</label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-8">
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="qty" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
