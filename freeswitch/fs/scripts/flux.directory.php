<?php
// ##############################################################################
// Flux SBC - Unindo pessoas e negócios
//
// Copyright (C) 2022 Flux Telecom
// Daniel Paixao <daniel@flux.net.br>
// Flux SBC Version 4.0 and above
// License https://www.gnu.org/licenses/agpl-3.0.html
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program. If not, see <http://www.gnu.org/licenses/>.
// ##############################################################################
$fs_logger->log ( "*************************** Directory Starts ********************************" );
$xml = "";
$fs_logger->log ( $_REQUEST );
if (isset ( $_REQUEST ['Event-Name'] ) && $_REQUEST ['Event-Name'] == 'CUSTOM' && $_REQUEST ['VM-Action'] == 'change-password') {
	$fs_logger->log ( "*************************** VM password change ********************************" );
	update_vm_data ( $fs_logger, $db, $_REQUEST ['VM-User-Password'], $_REQUEST ['VM-User'] );
}

if (isset ( $_REQUEST ['user'] ) && isset ( $_REQUEST ['domain'] )) {
	$xml = load_directory ( $fs_logger, $db );
	if ($xml == "")
		xml_not_found ();
	echo $xml;
} else {
	xml_not_found ();
}
$fs_logger->log ( "*************************** Directory Ends **********************************" );
exit ();
?>
