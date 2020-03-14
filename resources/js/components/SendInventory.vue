<template>
    <div class="col-md-8">
        <form action="" method="POST">  
            <div class="form-group">
                <label for="send_to">Which ShipBob warehouse are you shipping to?</label>
                <select name="send_to_location" id="send_to_location" class="form-control" v-model="send_to_location">
                    <option value="grapevine">Grapevine (TX)</option>
                    <option value="cicero">Cicero (IL)</option>
                    <option value="bethlehem">Bethlehem (PA</option>
                    <option value="moreno_valley">Moreno Valley (CA)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="send_to">Search for product(s) you’re sending to ShipBob</label>
                <!-- <select name="product_name" id="product_name" class="form-control product_name">                    
                </select> -->

                <v-select   v-model="products"  @search="getAllProducts" label="name" :options="allProducts" multiple>
                    
                </v-select>

            </div>
            <table class="table table-sm table-bordered search_product_table " v-if="products.length">
                <thead>
                    <tr>
                        <th class="text-center" width="10%">PRODUCT ID</th>
                        <th class="text-center" width="25%">PRODUCT NAME</th>
                        <th class="text-center" width="10%">PRODUCT SKU</th>
                        <th class="text-center" width="10%">PLATFORM</th>
                        <th class="text-center" width="15%">QUANTITY TO SEND</th>
                        <th class="text-center" width="5%">LOT</th>
                        <th class="text-center" width="15">EXPIRATION DATE	</th>
                        <th class="text-center" width="10%">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, index) in products" :key="index">
                        <td class="text-center search_product_id">{{ product.id }}</td>
                        <td class="text-center search_product_name">{{ product.name}}</td>
                        <td class="text-center search_product_sku">{{ product.sku }}</td>
                        <td class="text-center search_product_platform">{{ product.platform }}</td>
                        <td class="text-center search_product_quantity_to_send">
                            <input  type="number" value="1" min="1" class="form-control" v-model="quantity_to_send[index] " />
                        </td>
                        <td class="text-center search_product_lot">{{ product.lot }}</td>
                        <td class="text-center search_product_expration_date"></td>
                        <td class="text-center search_product_action">
                            <button class="btn btn-default" @click.prevent="removeProduct(product.id)">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <h5>How will your inventory arrive to ShipBob's fulfillment center?</h5>
                <hr>

                <label for="">Shipping Type</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping_type" id="parcel" value="parcel" v-model="shipping_type">
                    <label class="form-check-label" for="parcel">
                        Parcel (standard shipping)
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="shipping_type" id="less_than_truckload" value="less_than_truckload" v-model="shipping_type">
                    <label class="form-check-label" for="less_than_truckload">
                        Palletized container or LTL (less-than-truckload)
                    </label>
                    </div>
                    <div class="form-check ">
                    <input class="form-check-input" type="radio" name="shipping_type" id="floor_loaded_container" value="floor_loaded_container" v-model="shipping_type">
                    <label class="form-check-label" for="floor_loaded_container">
                        Floor loaded container<br><small>Labor cost may increase with floor loaded containers</small>
                    </label>
                    </div>
            </div>

            <div class="form-group">
                <label for="">How is your inventory configured?</label>



                <div class="parcel_radio" style="display:none">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parcel_sku" id="one_sku_per_box" value="one_sku_per_box" v-model="inventory_configure">
                        <label class="form-check-label" for="one_sku_per_box">
                            One SKU per box<br><small>Each box contains a single SKU</small>                                           
                        </label>
                        
                        </div>
                        <br>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="parcel_sku" id="multiple_sku_per_box" value="multiple_sku_per_box" v-model="inventory_configure">
                        <label class="form-check-label" for="multiple_sku_per_box">
                            Multiple SKUs per box <br><small>Each box has 2 or more SKUs</small> 
                        </label>
                        </div>
                </div>

                    
                <div class="less_than_truckload_radio" style="display:none">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="less_than_truckload_sku" id="one_sku_per_wallet" value="one_sku_per_wallet" v-model="inventory_configure">
                        <label class="form-check-label" for="exampleRadios1">
                            One SKU per pallet <br><small>Each pallet contains a single SKU</small>
                        </label>
                        </div>
                        <br>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="less_than_truckload_sku" id="multiple_sku_per_wallet" value="multiple_sku_per_wallet" v-model="inventory_configure">
                        <label class="form-check-label" for="exampleRadios2">
                            Multiple SKUs per pallet <br><small>Each pallet has 2 or more SKUs</small>
                        </label>
                        </div>

                </div>

                <div class="floor_loaded_container_radio" style="display:none">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="floor_load_container_sku" id="single_box_sku" value="single_box_sku" v-model="inventory_configure">
                        <label class="form-check-label" for="exampleRadios1">
                            One SKU per box <br><small>Each box contains a single SKU</small>
                        </label>
                        </div>
                        <br>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="floor_load_container_sku" id="multiple_box_sku" value="multiple_box_sku" v-model="inventory_configure">
                        <label class="form-check-label" for="exampleRadios2">
                            Multiple SKUs per box <br> <small>Each box has 2 or more SKUs</small>
                        </label>
                        </div>
                </div>



            </div>

            <div class="form-group" v-if="products.length">
                <label for="">
                    How is your shipment configured?
                </label>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>PRODUCT INFORMATION</th>
                            <th>SHIPMENT QUANTITY</th>
                            <th>QUANTITY PER BOX</th>
                            <th>OF BOX</th>
                            <th>TOTAL QUANTITY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in products" :key="index">
                            <td class="">{{ product.name }}</td>
                            <td class="">{{ quantity_to_send[index] }}</td>
                            <td class="">
                                <input type="number" class="form-control" min="1">
                            </td>
                            <td class="">
                                <input type="number" class="form-control" min="1">
                            </td>
                            <td class="">3</td>
                            <td class="">2015-05-10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="">Confirm shipping</label>
                Please address your parcel shipment to:
                Aquaskin C/O ShipBob, Inc

                4051 Freeport Parkway

                Grapevine, TX, 76051

                Phone:

                Email: support@shipbob.com

                <label for="">What is the estimated date of arrival for your shipment?</label>

                <input type="date" name="">
            </div>
            
            <div class="form-group">
                <label for="">Review & submit order
                </label>
                
                <div class="row">
                    <div class="col-md-6">
                        Shipping Details:
                        Aquaskin C/O ShipBob, Inc

                        4051 Freeport Parkway

                        Grapevine, TX, 76051

                        Phone:

                        Email: support@shipbob.com
                    </div>
                    <div class="col-md-6">
                        Shipping type: Parcel

                        # of boxes: 1

                        Configuration: Single SKU per box

                        Labels: Non-ShipBob Labels
                    </div>
                </div>

                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>PRODUCT INFORMATION</th>
                            <th>SHIPMENT QUANTITY</th>
                            <th>QUANTITY PER BOX</th>
                            <th>OF BOX</th>
                            <th>TOTAL QUANTITY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>40096</td>
                            <td>IPS</td>
                            <td>46464</td>
                            <td>10</td>
                            <td>3</td>
                            <td>2015-05-10</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit Receiving Order</button>
            </div>


        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                products:[],
                allProducts:[],
                send_to_location:[],
                shipping_type:'',
                inventory_configure:'',
                shipping_configure:[],
                quantity_to_send:[]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){

        },
        computed:{

        },
        methods:{
            getAllProducts(search, loading){
                axios.get('/get-all-product/'+search).then(res=>{
                    this.allProducts = res.data
                })
            },
            removeProduct(product){
                let newProducts = [];
                this.products.map(item=>{
                    if(item.id !=product){
                        newProducts.push(item)
                    }
                });
                this.products = newProducts;
            }
        }
    }
</script>
