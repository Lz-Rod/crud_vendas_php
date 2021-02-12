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
) engine=InnoDB default charset=utf8;*/

/*alter table vendas
modify data_venda date not null*/

-- describe vendas

/*insert into vendedores values
(1, 'Luiz Augusto', 'luizaugusto@gmail.com'),
(2, 'Maria Ferreira', 'mariaferreira@gmail.com'), 
(3, 'Stefanie Mendes', 'stefanie25@gmail.com');*/


/*insert into vendas (id_vendedor, valor_venda, data_venda) values
(1, '750.00', now()),
(2, '1000.00', now()),
(3, '3000.00', now());*/

-- select * from vendedores

-- select * from vendas

select vendedores.id, vendedores.nome, vendedores.email, vendas.comissao, vendas.valor_venda, vendas.data_venda from vendas join vendedores
where id_vendedor='3' and id='3';

