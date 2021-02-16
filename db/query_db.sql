-- create database db_sis_vendas default character set utf8 collate utf8_general_ci;

/*create table vendedores (
id int(11) not null,
nome varchar(255) not null,
email varchar(100) not null,
primary key(id)
) engine=InnoDB default charset=utf8;*/

-- describe vendedores

/*create table vendas (
cod int(11) not null auto_increment,
id_vendedor int(11) not null,
valor_venda decimal(7,2) not null,
comissao decimal(7,2) generated always as ((valor_venda/100)*8.5) stored,  	
data_venda TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
primary key(cod),
foreign key(id_vendedor) references vendedores(id)
ON DELETE CASCADE
ON UPDATE CASCADE
) engine=InnoDB default charset=utf8;*/

/*alter table vendas
modify data_venda date not null*/

-- describe vendas

/*insert into vendedores values
(1, 'Luiz Augusto', 'luizaugusto@gmail.com'),
(2, 'Maria Ferreira', 'mariaferreira@gmail.com'), 
(3, 'Stefanie Mendes', 'stefanie25@gmail.com');*/

/*insert into vendas (id_vendedor, valor_venda, data_venda) values
(3, '25.00', "2021-02-13"),
(3, '25.00', "2021-02-13"),
(4, '50.00', "2021-02-13");*/

-- select * from vendedores

-- select * from vendas

/*select vendedores.id, vendedores.nome, vendedores.email, vendas.comissao, vendas.valor_venda, vendas.data_venda from vendas join vendedores
where id_vendedor='1' and id='1';*/

/*delete from vendedores where id='7'*/

select sum(valor_venda) from vendas where data_venda="2021-02-16"
