# Edfa3ly Pre-Interview Task
-  I've used Laravel to implement an API endpoint that returns a JSON response contains a list of products with detailed price information and count cart billing data.  

# Perquisite
- `Docker`  
- `docker-compose`
- `Makefile`

# Dev-Ops Description :
- Docker & docker-compose. 
- register services  ``php-fpm ``, ``nginx``, ``MySql``
- Link each service to service registry .
- use ``make`` command to automate operations

# Install
- extract the .zip file or download using `git clone https://github.com/khaledsabbah/edfa3ly.git edfa3ly`
- `cd edfa3ly` <small> ( go to task location )</small>
- `make init`
- `make install permission`
- You should see the following image
![alt text](https://raw.githubusercontent.com/khaledsabbah/edfa3ly/main/images/docker.png)

- To Open docker container use the following command 
    
        docker exec -it phpfpm /bin/bash
        
# Running
- Import Edfa3ly PostMan collection in task project named as " Edfa3ly.postman_collection.json "  
*        Base Url :   http://localhost:9099

## Code Desgin and Architect
I tried to apply S.O.L.I.D principles & use some design pattern and Hydrate everything into object as possible.

#### Patterns used:
- ``Service Pattern``  Calling repository & prepare data before response.
- ``Facade Pattern``   Dynamically recieve objects with different implementations .
- ``Repository Pattern``   Retrieving data and aggregate multiple processes
- ``Composite Entity Pattern``  Applying composition and relations between Entities.
- ``Transformer Pattern``  Transform response object to and JSONable type like Array .