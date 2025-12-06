<?php

namespace App\Livewire;

use Livewire\Component;

class ScenarioTable extends Component
{

    public $hl7_scenarios_mixed = [];
    public function mount() {
 

$this->hl7_scenarios_mixed = [
[
        'code' => 'ADT^A01',
        'title' => 'Patient Admission - New Inpatient (Wales)',
        'description' => 'Notifies systems of a new patient admission.',
        'scenario' => 'A 68-year-old male is admitted to the **Cardiology Ward (Ward C1) at University Hospital of Wales (UHW), Cardiff**, following an emergency admission with chest pain. This message initiates the patient stay record.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: UHW PAS.', 'example' => '...|UHW_PAS|...'],
            ['name' => 'PID', 'description' => 'Patient Identification.', 'example' => 'Davies^Ieuan^A'],
            ['name' => 'PV1', 'description' => 'Visit details.', 'example' => '1|I|UHW^C1^B12^CARDIOLOGY'],
        ],
        'message' => "MSH|^~\\&|UHW_PAS|CVUHB|EHR|CVUHB|20251206112000||ADT^A01|MSG001|P|2.5\nEVN|A01|20251206112000\nPID|1||90123456^^^UHW^MRN||Davies^Ieuan^A||19570820|M|||78 Heol-y-Deri^^CARDIFF^^CF14 6AW^GBR\nPV1|1|I|UHW^C1^B12^CARDIOLOGY||||C1001^Williams^David^Dr|||CARDIOLOGY||\nDG1|1|I9|I21.9^Acute myocardial infarction^ICD10",
        'message_explanation' => "The **MSH** identifies the message type as ADT^A01 (Admission).\n The **PID** provides the patient's MRN (90123456) and name (Davies^Ieuan).\n The **PV1** indicates the patient's class as 'I' (Inpatient) and location as Ward C1, Bed B12.\n The **DG1** segment lists the primary diagnosis (ICD-10 I21.9)."
    ],
    [
        'code' => 'ADT^A03',
        'title' => 'Patient Discharge (Wales)',
        'description' => 'Notifies systems that a patient has been discharged.',
        'scenario' => 'A 45-year-old female is discharged from the **Orthopaedic Ward at Morriston Hospital, Swansea**, after successful surgery. The message updates the patient status to "Discharged" and notes the time of discharge.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Morriston PAS.', 'example' => '...|MOR_PAS|...'],
            ['name' => 'PID', 'description' => 'Patient Identification.', 'example' => 'Morgan^Rhian^E'],
            ['name' => 'PV1', 'description' => 'Discharge status.', 'example' => '1|D|Home'],
        ],
        'message' => "MSH|^~\\&|MOR_PAS|SBUHB|EHR|SBUHB|20251206112500||ADT^A03|MSG002|P|2.5\nEVN|A03|20251206112500\nPID|1||87654321^^^MOR^MRN||Morgan^Rhian^E||19800615|F|||15 Sketty Park Rd^^SWANSEA^^SA2 8BB^GBR\nPV1|1|D|MOR^Ward3^B5^ORTHO||||C2002^Patel^Raj^Dr|||ORTHOPAEDIC||\nPV2|1|01^Discharged to home|20251206112500",
        'message_explanation' => "The **MSH** signals the A03 (Discharge) event.\n The **EVN** segment logs the time of the event.\n The **PID** identifies the patient.\n The **PV1** segment updates the Patient Class to 'D' (Discharged), and the **PV2** segment specifies the discharge disposition (01^Discharged to home)."
    ],
    [
        'code' => 'ORU^R01',
        'title' => 'Lab Result - Critical (Wales)',
        'description' => 'Sends unsolicited laboratory results back to the ordering clinician/EHR.',
        'scenario' => 'The **LIS at Glangwili Hospital, Carmarthen**, reports a critical, high Glucose result (35.0 mmol/L) back to the EHR, which should trigger an immediate clinical alert.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Glangwili LIS.', 'example' => '...|GLA_LIS|...'],
            ['name' => 'OBR', 'description' => 'Test requested.', 'example' => 'GLA4002||GLU^Glucose^L'],
            ['name' => 'OBX', 'description' => 'Result Value (Flag H for High).', 'example' => '1|NM|GLU|35.0|mmol/L|HH'],
        ],
        'message' => "MSH|^~\\&|GLA_LIS|WBUHB|GLA_EHR|WBUHB|20251206114000||ORU^R01|MSG003|P|2.5\nPID|1||98765432^^^GLA^MRN||Garcia^Maria^C||19601111|F\nORC|RE|GLA4002\nOBR|1|GLA4002||GLU^Glucose Level^L|20251206113800\nOBX|1|NM|GLU^Glucose^L|1|35.0|mmol/L|4.0-7.8|HH",
        'message_explanation' => "The **ORU^R01** message contains results.\n The **OBR** segment details the test (Glucose Level).\n The **OBX** segment carries the actual result (35.0), the unit (mmol/L), the reference range (4.0-7.8), and the critical abnormality flag ('HH' for Critical High)."
    ],
    [
        'code' => 'SIU^S12',
        'title' => 'New Appointment Booking (Wales)',
        'description' => 'Notifies systems that a new outpatient appointment has been scheduled.',
        'scenario' => 'A new appointment is booked for an Ophthalmology review at **Ysbyty Gwynedd, Bangor**. The message includes the scheduled time, location, and consulting practitioner.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Ysbyty Gwynedd Scheduler.', 'example' => '...|YGY_SCHED|...'],
            ['name' => 'SCH', 'description' => 'Schedule Activity.', 'example' => 'SCH12345|OPHTH^Ophthalmology'],
            ['name' => 'AIL', 'description' => 'Appointment Location.', 'example' => '1|Clinic 2^Room B'],
        ],
        'message' => "MSH|^~\\&|YGY_SCHED|BCUHB|YGY_PAS|BCUHB|20251206114500||SIU^S12|MSG004|P|2.5\nPID|1||11223344^^^YGY^MRN||Evans^Eira^S||19900325|F|||Ffordd Penrhos^^BANGOR^^LL57 2HW^GBR\nSCH|1|SCH12345|OPHTH^Ophthalmology Clinic\nAIP|1|P5005^Jones^Siân^Dr|SCHED_A\nAIL|1|CL2^B^F1^Clinic 2|||20251215093000|20251215100000",
        'message_explanation' => "The **SIU^S12** message indicates a new schedule event.\n The **SCH** segment holds the schedule ID (SCH12345) and the service type (Ophthalmology).\n The **AIP** identifies the scheduled practitioner (Dr. Siân Jones), and the **AIL** specifies the location (Clinic 2) and the start/end times."
    ],
    [
        'code' => 'ADT^A08',
        'title' => 'Patient Information Update (Wales)',
        'description' => 'Updates demographic and contact information for a patient.',
        'scenario' => 'An outpatient at **Wrexham Maelor Hospital** updates her address following a move. The message sends the updated PID segment data to all subscribing clinical systems.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Wrexham PAS.', 'example' => '...|WMH_PAS|...'],
            ['name' => 'EVN', 'description' => 'Event Type.', 'example' => 'A08|...'],
            ['name' => 'PID', 'description' => 'Updated address.', 'example' => '...|...|^Updated Street^...'],
        ],
        'message' => "MSH|^~\\&|WMH_PAS|BCUHB|WMH_EHR|BCUHB|20251206124000||ADT^A08|MSG005|P|2.5\nEVN|A08|20251206124000\nPID|1||88990011^^^WMH^MRN||King^Elizabeth^L||19720301|F|||10 New St^^WREXHAM^^LL11 1AA^GBR||^PRN^PH^^01978 783 783\nNK1|1|Davies^Helen|Wife",
        'message_explanation' => "The **ADT^A08** message signifies a patient information update.\n The **PID** segment contains the updated patient demographic information, specifically the new address (10 New St, WREXHAM).\n The **NK1** segment confirms the next-of-kin details (Davies^Helen) remain associated with the patient."
    ],
    // --- 5 English NHS Trust Scenarios ---
    [
        'code' => 'ADT^A02',
        'title' => 'Patient Transfer (England)',
        'description' => 'Notifies systems of a patient transfer within the hospital.',
        'scenario' => 'A post-operative patient at **Guy\'s Hospital, London**, is moved from the Recovery Unit (REC) to a general Surgical Ward (Ward 10). The message updates the patient\'s location in the PV1 segment.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Guy\'s PAS.', 'example' => '...|GUY_PAS|...'],
            ['name' => 'PV1', 'description' => 'Old location and New location.', 'example' => '1|I|GUY^W10^B2|GUY^REC^B1'],
            ['name' => 'EVN', 'description' => 'Event Type.', 'example' => 'A02|...'],
        ],
        'message' => "MSH|^~\\&|GUY_PAS|GSTT|EHR|GSTT|20251206113000||ADT^A02|MSG006|P|2.5\nEVN|A02|20251206113000\nPID|1||33445566^^^GUY^MRN||Smith^Michael^P||19750401|M|||80 London Bridge St^^LONDON^^SE1 9RT^GBR\nPV1|1|I|GUY^W10^B2^SURGERY|GUY^REC^B1^RECOVERY||\nPV1|1|I|GUY^W10^B2^SURGERY||||C3003^Chen^Li^Dr|||GENERAL SURGERY||\n",
        'message_explanation' => "The **ADT^A02** message signals a patient transfer.\n The **PV1** segment's fields 3 and 6 detail the patient's new location (W10^B2^SURGERY) and previous location (REC^B1^RECOVERY), respectively, showing the movement from recovery to a surgical ward."
    ],
    [
        'code' => 'ORM^O01',
        'title' => 'New Order - Radiology (England)',
        'description' => 'A clinical system sends an order for a procedure (e.g., scan).',
        'scenario' => 'A doctor at **Manchester Royal Infirmary (MRI)** places an order for an urgent Pelvic Ultrasound. This order is sent from the EHR to the Radiology Information System (RIS).',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: MRI EHR.', 'example' => '...|MRI_EHR|...'],
            ['name' => 'ORC', 'description' => 'Order Control (New).', 'example' => 'NW|MRI4001'],
            ['name' => 'OBR', 'description' => 'Requested Procedure.', 'example' => '1|MRI4001||USPEL^Ultrasound Pelvis'],
        ],
        'message' => "MSH|^~\\&|MRI_EHR|MFT|MRI_RIS|MFT|20251206113500||ORM^O01|MSG007|P|2.5\nPID|1||98765432^^^MRI^MRN||Jones^Sarah^C||19601111|F|||Oxford Rd^^MANCHESTER^^M13 9WL^GBR\nORC|NW|MRI4001\nOBR|1|MRI4001||USPEL^Ultrasound Pelvis^L",
        'message_explanation' => "The **ORM^O01** message carries a new order.\n The **ORC** segment sets the control code to 'NW' (New Order) and assigns an EHR order ID (MRI4001).\n The **OBR** segment defines the ordered service as 'USPEL^Ultrasound Pelvis'."
    ],
    [
        'code' => 'RDE^O11',
        'title' => 'Pharmacy Dispense Request (England)',
        'description' => 'Request medication dispensing from the Pharmacy System.',
        'scenario' => 'A doctor at **St Thomas\' Hospital, London**, orders a prescription for Warfarin to be dispensed. The CPOE system sends the details to the Pharmacy system.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: St Thomas\' CPOE.', 'example' => '...|STH_CPOE|...'],
            ['name' => 'ORC', 'description' => 'Order Control (New).', 'example' => 'NW|RX9988'],
            ['name' => 'RXE', 'description' => 'Medication details.', 'example' => 'Warfarin|5 mg|Daily'],
        ],
        'message' => "MSH|^~\\&|STH_CPOE|GSTT|STH_PHARM|GSTT|20251206121000||RDE^O11|MSG008|P|2.5\nPID|1||55667788^^^STH^MRN||Johnson^Lisa^R||19950920|F|||Lambeth Palace Rd^^LONDON^^SE1 7EH^GBR\nORC|NW|RX9988\nRXE|1|WARFARIN|5 MG^MG|1|WAR5^Warfarin 5 mg Tab^Rx|QD^Daily^HL70140|30",
        'message_explanation' => "The **RDE^O11** message is a pharmacy dispense request.\n The **ORC** segment initiates the new order (RX9988).\n The **RXE** (Pharmacy Encoded Order) specifies the drug (WARFARIN), dosage (5 MG), and frequency ('QD' for Daily), along with a quantity of 30 tabs."
    ],
    [
        'code' => 'MDM^T02',
        'title' => 'Document Archival - Op Report (England)',
        'description' => 'Communicates a new operative report is available.',
        'scenario' => 'The Operative Report for a patient at **The Royal London Hospital, Barts Health NHS Trust**, is completed and signed off. This message informs the EHR/archival systems that the document is ready.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Transcription system.', 'example' => '...|RLH_TRANS|...'],
            ['name' => 'PID', 'description' => 'Patient Identification.', 'example' => 'Hughes^Ffion^E'],
            ['name' => 'TXA', 'description' => 'Document Type.', 'example' => 'OPR^Operative Report|FIN'],
        ],
        'message' => "MSH|^~\\&|RLH_TRANS|BHT|RLH_EHR|BHT|20251206123000||MDM^T02|MSG009|P|2.5\nEVN|T02|20251206123000\nPID|1||87654321^^^RLH^MRN||Hughes^Ffion^E||19800615|F|||Whitechapel Rd^^LONDON^^E1 1BB^GBR\nTXA|1|OPR^Operative Report^L|FIN|20251206123000|C2002^Patel^Raj^Dr\nOBX|1|TX|DOC_TEXT^Document Text^L|1|Procedure: Laparoscopic Cholecystectomy. Findings: Normal. EBL: 50ml.",
        'message_explanation' => "The **MDM^T02** message sends document status.\n The **TXA** segment identifies the document type ('OPR^Operative Report') and status ('FIN' for Final).\n The **OBX** segment contains the actual text of the report summary, indicating the procedure and key findings."
    ],
    [
        'code' => 'SIU^S15',
        'title' => 'Appointment Cancellation (England)',
        'description' => 'Notifies systems that a previously scheduled appointment has been cancelled.',
        'scenario' => 'The patient calls to cancel their physiotherapy appointment at **King\'s College Hospital, London**. The message cancels the scheduling block.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: KCH Scheduler.', 'example' => '...|KCH_SCHED|...'],
            ['name' => 'SCH', 'description' => 'Schedule Activity.', 'example' => 'SCH8008|Physio Appointment'],
            ['name' => 'NTE', 'description' => 'Cancellation Reason.', 'example' => 'Patient requested'],
        ],
        'message' => "MSH|^~\\&|KCH_SCHED|KCH|KCH_PAS|KCH|20251206115500||SIU^S15|MSG010|P|2.5\nPID|1||77889900^^^KCH^MRN||Thomas^Gareth^P||19650707|M|||Denmark Hill^^LONDON^^SE5 9RS^GBR\nSCH|1|SCH8008|PHYSIO^Physiotherapy\nNTE|1|Cancellation Reason: Patient requested",
        'message_explanation' => "The **SIU^S15** message signals an appointment cancellation.\n The **SCH** segment identifies the specific appointment ID (SCH8008) that is being cancelled.\n The **NTE** segment provides the explicit reason for the cancellation."
    ],
    // --- 5 Mixed/Other Scenarios ---
    [
        'code' => 'QBP^Q21',
        'title' => 'Query for Deferred Transmission',
        'description' => 'An ancillary system requests the latest patient information (demographics, location).',
        'scenario' => 'The **Pharmacy system at Morriston Hospital (Wales)** needs the latest patient location and attending doctor before dispensing a stat dose. It sends a query to the PAS.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Morriston Pharmacy.', 'example' => '...|MOR_PHARM|...'],
            ['name' => 'QPD', 'description' => 'Query Type.', 'example' => 'Z11^Get Patient Demographics'],
            ['name' => 'RCP', 'description' => 'Response Control.', 'example' => 'I^Immediate'],
        ],
        'message' => "MSH|^~\\&|MOR_PHARM|SBUHB|MOR_PAS|SBUHB|20251206125000||QBP^Q21|MSG011|P|2.5\nQPD|Z11^Get Patient Demographics^HL70471|QUERY1234|99008877\nRCP|I",
        'message_explanation' => "The **QBP^Q21** message is a query.\n The **QPD** (Query Parameter Definition) specifies the query type ('Z11^Get Patient Demographics') and includes the patient MRN (99008877) as the key parameter.\n The **RCP** segment requests an immediate response ('I')."
    ],
    [
        'code' => 'RRA^O18',
        'title' => 'Pharmacy Administration Acknowledgment',
        'description' => 'Confirms that a medication has been administered to a patient.',
        'scenario' => 'A nurse at the **Leeds General Infirmary (England)** administers a dose of Paracetamol. The eMAR system sends confirmation to the Pharmacy/EHR systems with the exact administration time.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: LGI eMAR.', 'example' => '...|LGI_EMAR|...'],
            ['name' => 'ORC', 'description' => 'Order Control (Status Change).', 'example' => 'SC|RX1122'],
            ['name' => 'RXA', 'description' => 'Administration details.', 'example' => '1|1|20251206160000|Paracetamol|500 MG'],
        ],
        'message' => "MSH|^~\\&|LGI_EMAR|LTHT|LGI_PHARM|LTHT|20251206160000||RRA^O18|MSG012|P|2.5\nPID|1||55667788^^^LGI^MRN||Jenkins^Lisa^R||19950920|F|||Great George St^^LEEDS^^LS1 3EX^GBR\nORC|SC|RX1122\nRXA|1|1|20251206160000|PARACETAMOL|500 MG^MG|1|PARA500^Paracetamol 500 mg Tab^Rx",
        'message_explanation' => "The **RRA^O18** message is a pharmacy administration acknowledgment.\n The **ORC** segment updates the order status ('SC' for Status Change).\n The **RXA** segment records the administration event, confirming the drug (PARACETAMOL) and the exact time of administration (20251206160000)."
    ],
    [
        'code' => 'DFT^P03',
        'title' => 'Detailed Financial Transaction - Billing',
        'description' => 'Communicates charges for services rendered to the financial system.',
        'scenario' => 'An imaging procedure (MRI) performed at **The Grange University Hospital (Wales)** is complete, and the RIS sends the charge for the service to the central finance system.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Grange RIS.', 'example' => '...|GRU_RIS|...'],
            ['name' => 'PID', 'description' => 'Patient Identification.', 'example' => 'Rees^Elen^M'],
            ['name' => 'FT1', 'description' => 'Financial Transaction.', 'example' => '1|CH|MRI BRAIN^CHARGE|...'],
        ],
        'message' => "MSH|^~\\&|GRU_RIS|ABUHB|FINANCE|ABUHB|20251206120500||DFT^P03|MSG013|P|2.5\nEVN|P03|20251206120500\nPID|1||44556677^^^GRU^MRN||Rees^Elen^M||19550303|F\nPV1|1|I|GRU^B2^B1^NEURO\nFT1|1|CH|20251206120500|20251206120500|MRI^MRI Brain Scan^L|1|550.00|GBP|RIS12345",
        'message_explanation' => "The **DFT^P03** message transmits financial data.\n The **FT1** (Financial Transaction) segment details the charge: the service type ('CH' for Charge), the procedure code ('MRI^MRI Brain Scan'), the quantity (1), and the value (550.00 GBP)."
    ],
    [
        'code' => 'MFN^M05',
        'title' => 'Master File Notification - Location Update',
        'description' => 'Updates the master file for hospital service locations/departments.',
        'scenario' => 'A new ward, **Ward D5 (Haematology)**, is opened at **Queen Elizabeth Hospital Birmingham (England)**. This message updates all ancillary systems (Lab, Radiology) with the new location code for bed allocation and service routing.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: QEH PAS.', 'example' => '...|QEH_PAS|...'],
            ['name' => 'MFI', 'description' => 'Master File Identification.', 'example' => 'LOC^Location Master File'],
            ['name' => 'LDP', 'description' => 'Location Department.', 'example' => 'D5^Haematology'],
        ],
        'message' => "MSH|^~\\&|QEH_PAS|UHB|LIS|UHB|20251206130000||MFN^M05|MSG014|P|2.5\nMFI|LOC^Location Master File|UPDT|20251206130000\nMFE|MAD|D5\nLCC|D5^Ward D5^L\nLDP|D5^Haematology Ward^L|001^HAEMATOLOGY",
        'message_explanation' => "The **MFN^M05** message updates a master file.\n The **MFI** identifies the master file as Location.\n The **MFE** signals an 'MAD' (Add) event for Location ID D5.\n The **LDP** segment defines the new location (Ward D5) and its associated department ('HAEMATOLOGY')."
    ],
    [
        'code' => 'ORR^O02',
        'title' => 'Order Request Response - Accept',
        'description' => 'A response from an ancillary system confirming receipt and acceptance of an order.',
        'scenario' => 'The **LIS at Nevill Hall Hospital (Wales)** receives an ORM message for blood tests and responds with an ORR message, acknowledging the order was placed successfully and providing the LIS-specific accession number.',
        'fields' => [
            ['name' => 'MSH', 'description' => 'Sender: Nevill Hall LIS.', 'example' => '...|NHH_LIS|...'],
            ['name' => 'MSA', 'description' => 'Message Acknowledgment (Accept).', 'example' => 'AA|ORD5001'],
            ['name' => 'ORC', 'description' => 'Order Control (Accepted).', 'example' => 'SC|LIS6789'],
        ],
        'message' => "MSH|^~\\&|NHH_LIS|ABUHB|NHH_EHR|ABUHB|20251206130500||ORR^O02|MSG015|P|2.5\nMSA|AA|MSG004|Order accepted and assigned LIS ID\nPID|1||87654321^^^NHH^MRN||Hughes^Ffion^E||19800615|F\nORC|SC|ORD5001|LIS6789\nOBR|1|ORD5001|LIS6789|FULL_BLOOD_COUNT^FBC^L",
        'message_explanation' => "The **ORR^O02** message is a response to an order.\n The **MSA** segment confirms successful processing ('AA' for Application Accept) of the original message ID (MSG004).\n The **ORC** segment changes the order status ('SC' for Status Change) and provides the LIS-assigned accession number (LIS6789)."
    ],
];
    }

    public function render()
    {
        return view('livewire.scenario-table');
    }
}
