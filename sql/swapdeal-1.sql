select * from swapdeal.swapitemregister;

select * from swapdeal.swapitems;


select * from swapdeal.swapitems a, swapdeal.swapuser b where a.itemID = 1 and a.itemContactId=b.id;

select * from swapdeal.swapuser;

delete from swapdeal.swapuser where mobile = '9822222000';

delete from swapdeal.swapuser where username is null;