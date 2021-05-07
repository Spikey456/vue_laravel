<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vuejs + Laravel | CRUD</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                
                justify-content: center;
                margin-left: 20%;
                margin-right: 20%;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div  id="app" >
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        Point of Sale App
                    </div>
                    
                    <!--
                    <div class="form-group">
                        <label for="make">Make</label>
                        <input type="text" class="form-control" id="make" required placeholder="Make" name="make" v-model="newCar.make">
                    </div>
                                        
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" required placeholder="Model" name="model" v-model="newCar.model">
                    </div>-->

                    

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">
                            <button class="btn btn-success" data-toggle="modal" data-target="#addModal">
                                Add Item
                            </button>
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                  
                        <tr v-for ="item in items">
                        <th scope="row">@{{item.id}}</th>
                        <td>@{{item.prod_name}}</td>
                        <td>PHP @{{item.price}}</td>
                        <td>@{{item.qty}}</td>
                        <td>PHP @{{item.total_price}}</td>
                        <td @click="setVal(item.id, item.prod_name, item.price, item.qty)"  class="btn btn-info" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>
                        </td>
                        <td  @click.prevent="deleteItem(item)" class="btn btn-danger"> 
                        <i class="fa fa-trash"></i>
                        </td>
                        </tr>
                   
                    </tbody>
                </table>
                    <p class="text-lg">Total: PHP @{{ total_amount }}</p>
                    <button type="button" class="btn btn-primary" @click.prevent="computeTotal()">Compute</button>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                             Modal content
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Item</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                
                            <input type="hidden" disabled class="form-control" id="e_id" name="id"
                                                        required  :value="this.e_id">
                                                Product Name: <input type="text" class="form-control" id="e_prod_name" name="prod_name"
                                                        required  :value="this.e_prod_name">
                                                Price: <input type="number" class="form-control" id="e_price" name="price"
                                                required  :value="this.e_price">
                                                Quantity: <input type="number" class="form-control" id="e_qty" name="qty"
                                                required  :value="this.e_qty">
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click.prevent="editItem()" data-dismiss="modal">Edit Item</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                    </div>
                    
                    <div id="addModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                
                                <h4 class="modal-title">Add Product</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                           
                            <div class="modal-body">
                                Product Name: <input type="text" class="form-control" id="prod_name" name="prod_name" v-model="newItem.prod_name"
                                        required  >
                                Price: <input type="number" class="form-control" id="price" name="price" v-model="newItem.price"
                                required  >
                                Quantity: <input type="number" class="form-control" id="qty" name="qty" v-model="newItem.qty"
                                required  >
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" @click.prevent="createItem()">Save Item</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>