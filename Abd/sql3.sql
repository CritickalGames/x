1. Mostrar todos los autos alquilados desde 1/6/2022 del 2022 
USE AUTOMOTORA;
 
select Marca, Modelo, Matricula
from Vehiculo
where Matricula IN (
    select Matricula
    from AUTOS
    where Matricula IN (
        select Vehiculo
        from ALQUILERES
        where fechaEntrega>='2022-6-1'
    )
);
2. Mostrar los nombres de los funcionarios que realizaron algún alquiler de vehículos marca Chevrolet 
USE AUTOMOTORA;
 
select Nombre, IdFuncionario
from FUNCIONARIO
where IdFuncionario IN(
    select Funcionario
    from VENTAS
    where Vehiculo IN (
        select Matricula
        from VEHICULO
        where Marca = "Chevrolet"
    )
);
3. Mostrar la cantidad de vehículos marca Fiat que posee cada sucursal 
USE AUTOMOTORA;
 
select IdSucursal, nombre, count(*)
from SUCURSAL S, vehiculo
where (IdSucursal, marca) in (
    SELECT sucursal, marca
    FROM vehiculo
    WHERE marca = "fiat"
)GROUP BY IdSucursal;

4. Mostrar los funcionarios y la cantidad de ventas realizadas 
USE AUTOMOTORA;
 
select F.IdFuncionario, F.Nombre, count(*)
from FUNCIONARIO F, VENTAS V
where (IdFuncionario) in (
    SELECT Funcionario
    FROM VENTAS
)group by IdFuncionario;
5. Mostrar la cantidad de Autos que posee cada sucursal.
USE AUTOMOTORA;
 
select IdSucursal, nombre, count(*)
from SUCURSAL S, vehiculo
where (IdSucursal, Matricula) in (
    SELECT sucursal, Matricula
    FROM vehiculo
    WHERE Matricula IN(        
        select Matricula
        from AUTOS
    )
)GROUP BY IdSucursal;
