<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CashDiscountType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum CashDiscountType: string {
    case NotSpecified = "not_specified";
    case PurchaseOfGoods = "purchase_of_goods";
    case PurchaseOfRawMaterialsAndSupplies = "purchase_of_raw_materials_and_supplies";
}
