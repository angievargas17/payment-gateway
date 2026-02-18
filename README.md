🧩 EJERCICIO: SISTEMA DE PAGOS MODULAR Y ESCALABLE
🎯 Objetivo

Construir un módulo de pagos que permita procesar pagos usando múltiples proveedores, registre cada transacción, y ejecute acciones en segundo plano (notificaciones, auditoría, logs) usando eventos y colas.

🧱 Requisitos técnicos obligatorios

Debes usar TODOS estos conceptos:

Concepto	= Uso obligatorio
Strategy Pattern	= Para cambiar el proveedor de pago
Singleton	= Para configuración o cliente HTTP
Observer / Events	= Para reaccionar cuando un pago cambia de estado
Queues (background jobs)	= Para enviar notificaciones
CRUD	= Para registrar y consultar pagos
Estados de pago	= pending, paid, failed

🗂️ Contexto del negocio

La empresa PaySystem permite pagar órdenes usando distintos métodos:

💳 Tarjeta de crédito

🅿️ PayPal

🏦 Transferencia bancaria

Cada pago debe:

Ser procesado por el proveedor correcto

Guardarse en base de datos

Emitir eventos

Enviar notificaciones en segundo plano

Permitir consultar historial de pagos
