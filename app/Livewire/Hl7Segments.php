<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HL7Segment;
use Illuminate\Support\Facades\Auth;
class Hl7Segments extends Component
{
    public $segments = [];
    public $selectedSegments = [];
public $selectedSegmentsData = [];
public $collectedFields = [];
public $fakeMessage = '';
public $hl7Message = '';

    public function mount() {
        $this->segments = [
    [
        'code' => 'MSH',
        'title' => 'Message Header segment',
        'description' => 'Contains metadata about message source, destination, version, and timestamp',
        'fields' => [
            ['name' => 'Field Separator', 'description' => 'Character separating fields', 'example' => '|'],
            ['name' => 'Encoding Characters', 'description' => 'Characters defining component and subcomponent separators', 'example' => '^~\\&'],
            ['name' => 'Sending Application', 'description' => 'Application sending the message', 'example' => 'LabSystem'],
            ['name' => 'Receiving Application', 'description' => 'Application receiving the message', 'example' => 'EMR'],
            ['name' => 'Message Type', 'description' => 'Type of message being sent', 'example' => 'ADT^A01'],
            ['name' => 'Message Control ID', 'description' => 'Unique ID for the message', 'example' => '123456'],
            ['name' => 'Date/Time of Message', 'description' => 'Timestamp when the message was created', 'example' => '2025-12-04T15:30:00']
        ]
    ],
    [
        'code' => 'PID',
        'title' => 'Patient Identification segment',
        'description' => 'Demographics like name, ID, address, and date of birth',
        'fields' => [
            ['name' => 'Patient ID', 'description' => 'Unique identifier for the patient', 'example' => 'P12345'],
            ['name' => 'Patient Name', 'description' => 'Full legal name of the patient', 'example' => 'John Doe'],
            ['name' => 'Date of Birth', 'description' => 'Patient birth date', 'example' => '1990-01-01'],
            ['name' => 'Sex', 'description' => 'Patient gender', 'example' => 'M'],
            ['name' => 'Address', 'description' => 'Patient residential address', 'example' => '123 Main St'],
            ['name' => 'Phone Number', 'description' => 'Contact number', 'example' => '+44 1234 567890'],
            ['name' => 'SSN', 'description' => 'Social security or national ID', 'example' => 'AB123456C']
        ]
    ],
    [
        'code' => 'PV1',
        'title' => 'Patient Visit segment',
        'description' => 'Details of the patient’s admission, location, type, and attending physician',
        'fields' => [
            ['name' => 'Patient Class', 'description' => 'Type of patient visit (inpatient/outpatient)', 'example' => 'Inpatient'],
            ['name' => 'Assigned Patient Location', 'description' => 'Current hospital/ward location', 'example' => 'Ward 3A'],
            ['name' => 'Admission Type', 'description' => 'Type of admission', 'example' => 'Emergency'],
            ['name' => 'Attending Doctor', 'description' => 'Primary doctor responsible', 'example' => 'Dr. Smith'],
            ['name' => 'Visit Number', 'description' => 'Unique visit identifier', 'example' => 'V98765']
        ]
    ],
    [
        'code' => 'OBR',
        'title' => 'Observation Request segment',
        'description' => 'Orders or requests for lab tests or procedures',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this OBR segment', 'example' => '1'],
            ['name' => 'Placer Order Number', 'description' => 'ID from ordering system', 'example' => 'PO1234'],
            ['name' => 'Filler Order Number', 'description' => 'ID from performing system', 'example' => 'FO5678'],
            ['name' => 'Universal Service ID', 'description' => 'Test or service code', 'example' => 'CBC'],
            ['name' => 'Observation Date/Time', 'description' => 'Scheduled or collected datetime', 'example' => '2025-12-04T16:00:00']
        ]
    ],
    [
        'code' => 'OBX',
        'title' => 'Observation segment',
        'description' => 'Results or observations from tests or procedures',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this OBX segment', 'example' => '1'],
            ['name' => 'Value Type', 'description' => 'Type of data (e.g., numeric, text)', 'example' => 'NM'],
            ['name' => 'Observation Identifier', 'description' => 'Code identifying observation', 'example' => 'WBC'],
            ['name' => 'Observation Value', 'description' => 'Actual measured or recorded value', 'example' => '5.4'],
            ['name' => 'Units', 'description' => 'Unit of measurement', 'example' => '10^9/L'],
            ['name' => 'Reference Range', 'description' => 'Expected normal range', 'example' => '4.0-11.0'],
            ['name' => 'Abnormal Flags', 'description' => 'Indicates abnormal results', 'example' => 'N']
        ]
    ],
    [
        'code' => 'DG1',
        'title' => 'Diagnosis segment',
        'description' => 'Contains diagnosis codes or clinical diagnosis details',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this DG1', 'example' => '1'],
            ['name' => 'Diagnosis Coding Method', 'description' => 'Coding system used', 'example' => 'ICD-10'],
            ['name' => 'Diagnosis Code', 'description' => 'Diagnosis identifier', 'example' => 'J20.9'],
            ['name' => 'Diagnosis Description', 'description' => 'Text description of diagnosis', 'example' => 'Acute bronchitis, unspecified'],
            ['name' => 'Diagnosis Date/Time', 'description' => 'Date diagnosis was assigned', 'example' => '2025-12-04']
        ]
    ],
    [
        'code' => 'PR1',
        'title' => 'Procedures segment',
        'description' => 'Details of procedures or operations performed',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this PR1', 'example' => '1'],
            ['name' => 'Procedure Coding Method', 'description' => 'System used to code procedure', 'example' => 'CPT'],
            ['name' => 'Procedure Code', 'description' => 'Procedure identifier', 'example' => '99213'],
            ['name' => 'Procedure Description', 'description' => 'Text description of procedure', 'example' => 'Office visit, established patient'],
            ['name' => 'Procedure Date/Time', 'description' => 'Date procedure performed', 'example' => '2025-12-04T14:30:00']
        ]
    ],
    [
        'code' => 'SCH',
        'title' => 'Schedule segment',
        'description' => 'Contains scheduling or appointment information',
        'fields' => [
            ['name' => 'Placer Appointment ID', 'description' => 'Appointment ID from ordering system', 'example' => 'AP123'],
            ['name' => 'Filler Appointment ID', 'description' => 'Appointment ID from performing system', 'example' => 'FP456'],
            ['name' => 'Occurrence Number', 'description' => 'Sequence for recurring appointments', 'example' => '1'],
            ['name' => 'Appointment Reason', 'description' => 'Reason for the appointment', 'example' => 'Routine check-up'],
            ['name' => 'Appointment Type', 'description' => 'Type/category of appointment', 'example' => 'Consultation']
        ]
    ],
    [
        'code' => 'AIP',
        'title' => 'Appointment Information segment',
        'description' => 'Contains appointment details like attending provider, location, and time',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this AIP segment', 'example' => '1'],
            ['name' => 'Personnel Resource ID', 'description' => 'Provider identifier', 'example' => 'DR123'],
            ['name' => 'Resource Type', 'description' => 'Type of resource (doctor, nurse, equipment)', 'example' => 'Doctor'],
            ['name' => 'Start Date/Time', 'description' => 'Start of appointment', 'example' => '2025-12-05T09:00:00'],
            ['name' => 'End Date/Time', 'description' => 'End of appointment', 'example' => '2025-12-05T09:30:00']
        ]
    ],
    [
        'code' => 'AIL',
        'title' => 'Appointment Information - Location segment',
        'description' => 'Specifies location information for the appointment',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this AIL segment', 'example' => '1'],
            ['name' => 'Location Resource ID', 'description' => 'Location identifier', 'example' => 'LOC123'],
            ['name' => 'Location Type', 'description' => 'Type of location (ward, room, lab)', 'example' => 'Ward'],
            ['name' => 'Location Group', 'description' => 'Grouping of locations if applicable', 'example' => 'Group A'],
            ['name' => 'Start Date/Time', 'description' => 'Start time of appointment at this location', 'example' => '2025-12-05T09:00:00'],
            ['name' => 'End Date/Time', 'description' => 'End time of appointment at this location', 'example' => '2025-12-05T09:30:00']
        ]
    ],
    [
        'code' => 'NK1',
        'title' => 'Next of Kin segment',
        'description' => 'Information about patient’s next of kin or emergency contacts',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this NK1 segment', 'example' => '1'],
            ['name' => 'Name', 'description' => 'Name of next of kin', 'example' => 'Jane Doe'],
            ['name' => 'Relationship', 'description' => 'Relationship to patient', 'example' => 'Spouse'],
            ['name' => 'Address', 'description' => 'Address of next of kin', 'example' => '123 Main St'],
            ['name' => 'Phone Number', 'description' => 'Contact number of next of kin', 'example' => '+44 9876 543210']
        ]
    ],
    [
        'code' => 'AL1',
        'title' => 'Patient Allergy Information segment',
        'description' => 'Contains allergy details like type, severity, and reactions',
        'fields' => [
            ['name' => 'Set ID', 'description' => 'Sequence number for this AL1', 'example' => '1'],
            ['name' => 'Allergen Type', 'description' => 'Type of allergen', 'example' => 'Food'],
            ['name' => 'Allergen Code/Mnemonic', 'description' => 'Allergen code', 'example' => 'PNUT'],
            ['name' => 'Allergen Description', 'description' => 'Description of allergen', 'example' => 'Peanuts'],
            ['name' => 'Reaction', 'description' => 'Observed reaction', 'example' => 'Hives'],
            ['name' => 'Severity', 'description' => 'Severity of the reaction', 'example' => 'Severe']
        ]
    ],
    [
        'code' => 'EVN',
        'title' => 'Event Type segment',
        'description' => 'Details about the event that triggered the message',
        'fields' => [
            ['name' => 'Event Type Code', 'description' => 'Code identifying event type', 'example' => 'A01'],
            ['name' => 'Recorded Date/Time', 'description' => 'When the event was recorded', 'example' => '2025-12-04T15:45:00'],
            ['name' => 'Date/Time Planned Event', 'description' => 'Planned date/time of event', 'example' => '2025-12-04T16:00:00'],
            ['name' => 'Event Reason Code', 'description' => 'Reason for the event', 'example' => 'Routine'],
            ['name' => 'Operator ID', 'description' => 'Person performing or recording the event', 'example' => 'OP123']
        ]
    ]
];
foreach ($this->segments as &$segment) {
    foreach ($segment['fields'] as &$field) {
        // create a unique, safe key: remove spaces, special chars
        $field['safe_key'] = preg_replace('/[^a-zA-Z0-9_]/', '_', $field['name']);
    }
}
foreach ($segment['fields'] as $field) {
    $this->selectedSegmentsData[$segment['code']][$field['safe_key']] = '';
}

}



 // string to hold generated HL7

public function generateHL7()
{
    $this->fakeMessage = '';
    $segmentOrder = [
        'MSH', 'EVN', 'PID', 'PV1', 'NK1', 'AL1', 
        'OBR', 'OBX', 'DG1', 'PR1', 'SCH', 'AIP', 'AIL'
    ];

    $segments = [];

    foreach ($segmentOrder as $segCode) {
        if (!isset($this->selectedSegmentsData[$segCode])) continue;

        $fields = $this->selectedSegmentsData[$segCode];
        $segmentParts = [$segCode];

        foreach ($fields as $value) {
            $segmentParts[] = $value !== null ? $value : '';
        }

        $segments[] = implode('|', $segmentParts);

        // Collect non-empty fields
        foreach ($fields as $field => $value) {
            if ($value !== null && $value !== '') {
                $this->collectedFields[] = [
                    'segment' => $segCode,
                    'field' => $field,
                    'value' => $value
                ];
            }
        }
    }

    $this->hl7Message = implode("\n", $segments); // newline for proper HL7 display
    HL7Segment::create([
            'user_id' => Auth::id(),
            'message' => $this->hl7Message,
        ]);
}

public function downloadHL7()
{
    // If there's literally nothing typed OR no segments selected, dip out
    if (empty($this->selectedSegmentsData)) {
        return;
    }

    $segmentOrder = [
        'MSH', 'EVN', 'PID', 'PV1', 'NK1', 'AL1',
        'OBR', 'OBX', 'DG1', 'PR1', 'SCH', 'AIP', 'AIL'
    ];

    $hl7Text = [];

    foreach ($segmentOrder as $segCode) {
        if (!isset($this->selectedSegmentsData[$segCode])) {
            continue;
        }

        $fields = $this->selectedSegmentsData[$segCode];

        // Build segment row
        $segmentParts = [$segCode];

        foreach ($fields as $value) {
            $segmentParts[] = $value !== null ? $value : '';
        }

        $hl7Text[] = implode('|', $segmentParts);
    }

    $filename = 'hl7_message_' . now()->format('Ymd_His') . '.hl7';

    return response()->streamDownload(
        fn () => print(implode("\r\n", $hl7Text)),
        $filename,
        [
            'Content-Type' => 'application/hl7-v2; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]
    );
}


public function clearData()
{
      $this->selectedSegments = [];
    $this->selectedSegmentsData = [];
    $this->collectedFields = [];
    //$this->hl7Message = '';
}
public function collectAllFields()
{
    $this->collectedFields = []; // reset

    foreach ($this->selectedSegmentsData as $segment => $fields) {
        foreach ($fields as $field => $value) {
            if (!is_null($value) && $value !== '') { // only collect if value entered
                $this->collectedFields[] = [
                    'segment' => $segment,
                    'field' => $field,
                    'value' => $value,
                ];
            }
        }
    }
    $this->generateHL7();
}

public function generateFakeMessage()
{
    $this->hl7Message = null; // wipe real message
    $this->fakeMessage = <<<HL7
MSH|^~\&|FakeLab|1234|Hospital|5678|202501011230||ORM^O01|ABC123|P|2.3
PID|1||123456^^^Hospital||DOE^JOHN||19800101|M|||123 Fake St^^Faketown^FT^^UK
PV1|1|I|W01^10^A||||12345^FAKEDOCTOR^ALICE
OBR|1|1234|5678|GLUCOSE^BLOOD PANEL^LN|202501011200
OBX|1|NM|GLUCOSE^BLOOD^LN||5.4|mmol/L|3.8-6.0|N
HL7;
}


public function addFieldValue($segment, $field, $value)
{
    $value = $this->selectedSegmentsData[$segment][$field] ?? null;

    $this->collectedFields[] = [
        'segment' => $segment,
        'field' => $field,
        'value' => $value,
    ];
}

public function fillExample($segmentCode, $fieldSafeKey, $example)
{
    $this->selectedSegmentsData[$segmentCode][$fieldSafeKey] = $example;
}

public function fillExampleFromEvent($event)
{
    $segment = $event->target->getAttribute('data-segment');
    $field = $event->target->getAttribute('data-field');
    $example = $event->target->getAttribute('data-example');

    $this->selectedSegmentsData[$segment][$field] = $example;
}



        public function selectSegment($code)
    {
         $segment = collect($this->segments)->firstWhere('code', $code);
    if ($segment && !isset($this->selectedSegments[$code])) {
        $this->selectedSegments[$code] = $segment;

        // Initialize empty input values for each field
        foreach ($segment['fields'] as $field) {
            $this->selectedSegmentsData[$code][$field['name']] = '';
            }
        }
    }

    public function removeSegment($code)
    {
    unset($this->selectedSegments[$code]);
    unset($this->selectedSegmentsData[$code]);
    }


    public function render()
    {
        return view('livewire.hl7-segments');
    }
}
