<?php 

class Pedidos extends Conectar{

    public function get_pedidos(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_pedidos_proveedor ";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_pedido($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_pedidos_proveedor WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_pedido($idsocio, $fechapedido, $detalle, $subtotal, $totalisv, $total, $fechaentrega, $estado){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO ma_pedidos_proveedor(id,id_socio,fecha_pedido,detalle,sub_total,total_isv,total,fecha_entrega,estado)
        VALUES (NULL,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idsocio);
        $sql->bindValue(2, $fechapedido);
        $sql->bindValue(3, $detalle);
        $sql->bindValue(4, $subtotal);
        $sql->bindValue(5, $totalisv);
        $sql->bindValue(6, $total);
        $sql->bindValue(7, $fechaentrega);
        $sql->bindValue(8, $estado);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_pedido($id, $detalle, $total, $estado){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE ma_pedidos_proveedor SET detalle=?,total=?,estado =? WHERE id= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $detalle);
        $sql->bindValue(2, $total);
        $sql->bindValue(3, $estado);
        $sql->bindValue(4, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_pedido($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM ma_pedidos_proveedor WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>