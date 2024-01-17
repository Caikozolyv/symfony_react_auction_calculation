import React, { useEffect, useState } from 'react';

function Form() {
    const [price, setPrice] = useState(0);
    const [type, setType] = useState(1);
    const [fees, setFees] = useState({});

    const handlePriceChange = (e) => {
        setPrice(e.target.value);
    }

    const handleTypeChange = (e) => {
        setType(e.target.value);
    }

    useEffect(() => {
        const fetchData = async () => {
            let res = await fetch('https://localhost:8000/fees', {
                method: 'POST', 
                body: JSON.stringify({
                    price: price,
                    type: type
                }),
                headers: {
                    'Content-type': 'application/json; charset=UTF-8'
                }
            });
            let data = await res.json();
            setFees(JSON.parse(data));
        }
        fetchData();
    }, [price, type]);
    
    return (

        <div className="center">
            <div className="container">
                <div className="row">
                    <h1>Calcul d'encan</h1>
                    <div className="col-sm-12">
                        <form>
                            <div className="formGroup">
                                <div className="row">
                                    <div className="col-md-4 offset-md-4">
                                        <label htmlFor='price'>Price : </label>
                                        <input id="price" name="price" type="number" value={price} onChange={handlePriceChange} />
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4 offset-md-4">
                                        <div className="radio">
                                            <label htmlFor='ordinaryVehicle'>
                                                <input type="radio" id="ordinaryVehicle" name="vehicle" value="1" checked={type == 1} onChange={handleTypeChange} />
                                                Ordinary vehicle
                                            </label>
                                        </div>
                                        <div className="radio">
                                            <label htmlFor='luxuryVehicle'>
                                                <input type="radio" id="luxuryVehicle" name="vehicle" value="2" checked={type == 2} onChange={handleTypeChange} />
                                                Luxury vehicle
                                            </label>
                                        </div>  
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4 offset-md-4"> 
                                        <label htmlFor='userFees'>User fees : </label>
                                        <input type='text' id='userFees' disabled value={fees['user_fees']} />
                                    </div>
                                </div>  
                                <div className="row">
                                    <div className="col-md-4 offset-md-4"> 
                                        <label htmlFor='specialFees'>Special fees : </label>
                                        <input type='text' id='specialFees' disabled value={fees['special_fees']} />
                                    </div>
                                </div>  
                                <div className="row">
                                    <div className="col-md-4 offset-md-4"> 
                                        <label htmlFor='associationFees'>Association fees : </label>
                                        <input type='text' id='associationFees' disabled value={fees['association_fees']} />
                                    </div>
                                </div>  
                                <div className="row">
                                    <div className="col-md-4 offset-md-4"> 
                                        <label htmlFor='storageCosts'>Storage Costs : </label>
                                        <input type='text' id='storageCosts' disabled value={fees['storage_costs']} />
                                    </div>
                                </div> 
                                <div className="row">
                                    <div className="col-md-4 offset-md-4"> 
                                        <label htmlFor='totalPrice'>Total price : </label>
                                        <input type='text' id='totalPrice' disabled value={fees['total_price']} />
                                    </div>
                                </div>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Form;