select
    b.name as brand_name,
    o.name as outlet_name,
    o.address,
    o.latitude,
    o.longitude,
    count(p.id) as total_product,
    round(
        ST_Distance_Sphere(
            point(
                106.827152818227,
                -6.175220068856569
            ),
            point(o.longitude, o.latitude)
        ) * 0.001,
        1
    ) as distances_in_km
from outlets o
    left join brands b on b.id = o.brand_id
    left join products p on p.brand_id = b.id
group by
    b.name,
    o.name,
    o.address,
    o.latitude,
    o.longitude
order by distances_in_km asc;