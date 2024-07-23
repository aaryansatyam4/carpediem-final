const product=[
    {
        id: 0,
        image: 'Soccer_Jersey_Kit_Mockup_Front.jpg',
        title: 'Soccer Kit',
        price: 3500,
    },
    {
        id: 1,
        image: 'CRICKET 2.jpg',
        title: 'Soccer Jersey',
        price: 1299,
    },
    {
        id: 2,
        image: 'jersey_front_longsleeve.jpg',
        title: ' Athletic Kit',
        price: 4500,
    },
    {
        id: 3,
        image: 'BASKETBALL_SHORT_FRONT_FULLMAX_FABRIC.jpg',
        title: ' Shorts',
        price: 1200,
    },
    {
        id: 4,
        image: '377.jpg',
        title: ' Athletic Kit',
        price: 1499,
    },
    {
        id: 5,
        image: 'CRICKET 1.jpg',
        title: ' Cricket White Kit',
        price: 1699,
    }

];
const categories=[...new Set(product.map((item)=>
    {return item}))]
    let i=0;
    var{iamge,title,price}=item;
    return(
        <div class='box'>
            <div class='img-box'>
                <img class='images' src=${image}></img>
            </div>
        </div>
    )