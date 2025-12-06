
@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4"> DInteroperability Resource Catalogue</h2>
    
    <!-- Intro Card -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <p class="text-gray-700">Essential resources for NHS interoperability standards, implementation guides, and tools.<br>I've highlighted ones in bold if you are creating health systems!</p>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-300">
                    <th class="text-left p-4 font-bold">Resource Name</th>
                    <th class="text-left p-4 font-bold">Focus</th>
                    <th class="text-left p-4 font-bold">Link</th>
                </tr>
            </thead>
        <tbody>
    <!-- 1. Standards & Official Documentation -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">1. Standards & Official Documentation</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>FHIR Specification (The Build Site)</strong></td>
        <td class="p-4"><strong>Reference: The authoritative source for all FHIR resources and data types. (Most Important)</strong></td>
        <td class="p-4"><a href="https://hl7.org/fhir/" target="_blank" class="text-blue-600 hover:underline font-semibold">https://hl7.org/fhir/</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">HL7 International Official Site</td>
        <td class="p-4">Reference: Governing body for all HL7 standards (v2, v3, FHIR).</td>
        <td class="p-4"><a href="https://www.hl7.org/" target="_blank" class="text-blue-600 hover:underline font-semibold">https://www.hl7.org/</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">HL7 v2 Messaging Standard Documentation</td>
        <td class="p-4">Reference: Formal documentation for the legacy, widely-used HL7 version 2 standard.</td>
        <td class="p-4"><a href="https://www.hl7.org/implement/standards/product_brief.cfm?product_id=185" target="_blank" class="text-blue-600 hover:underline font-semibold">HL7 v2.x Standards</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">The Four Levels of Interoperability</td>
        <td class="p-4">Conceptual: Explains Foundational, Structural, Semantic, and Organizational interoperability.</td>
        <td class="p-4"><a href="https://www.wolterskluwer.com/en/expert-insights/understand-the-four-levels-of-interoperability-in-healthcare" target="_blank" class="text-blue-600 hover:underline font-semibold">Four Levels of Interoperability Guide</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">Integrating the Healthcare Enterprise (IHE)</td>
        <td class="p-4">Framework: Defines technical profiles for using standards to solve clinical problems.</td>
        <td class="p-4"><a href="https://www.ihe.net/" target="_blank" class="text-blue-600 hover:underline font-semibold">https://www.ihe.net/</a></td>
    </tr>

    <!-- 2. UK Implementation & Policy (Must-Watch) -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">2. UK Implementation & Policy (Must-Watch)</td>
    </tr>
    <tr class="border-b hover:bg-red-50">
        <td class="p-4 text-red-700"><strong>DCB0129 Clinical Risk Management</strong></td>
        <td class="p-4"><strong>MANDATORY SAFETY (Manufacturer): Clinical risk standard for suppliers/app developers.</strong></td>
        <td class="p-4"><a href="https://digital.nhs.uk/services/clinical-safety" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS DCB0129 Guidance</a></td>
    </tr>
    <tr class="border-b hover:bg-red-50">
        <td class="p-4 text-red-700"><strong>Digital Technology Assessment Criteria (DTAC)</strong></td>
        <td class="p-4"><strong>Policy & Compliance: Covers Safety, Data Protection, and Interoperability for digital health systems.</strong></td>
        <td class="p-4"><a href="https://transform.england.nhs.uk/key-tools-and-info/digital-technology-assessment-criteria-dtac/" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS DTAC Framework</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>NHS FHIR UK Core IG</strong></td>
        <td class="p-4"><strong>Official profiles and extensions required for FHIR exchange in the UK.</strong></td>
        <td class="p-4"><a href="https://simplifier.net/guide/ukcore/" target="_blank" class="text-blue-600 hover:underline font-semibold">UK Core IG on Simplifier</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">NHS England API Catalogue</td>
        <td class="p-4">Technical & Roadmaps: Lists all current, developing, and deprecated APIs.</td>
        <td class="p-4"><a href="https://digital.nhs.uk/developer/api-catalogue" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS API Catalogue</a></td>
    </tr>

    <!-- 3. Developer Tools & Migration -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">3. Developer Tools & Migration</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>HL7 v2 to FHIR Mapping Guide</strong></td>
        <td class="p-4"><strong>Official HL7 guide mapping v2 segments to FHIR Resources.</strong></td>
        <td class="p-4"><a href="https://build.fhir.org/ig/HL7/v2-to-fhir/" target="_blank" class="text-blue-600 hover:underline font-semibold">v2 to FHIR Mapping Guide</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>FHIR Public Test Servers (HAPI)</strong></td>
        <td class="p-4"><strong>Sandbox environment for testing FHIR resources and interactions.</strong></td>
        <td class="p-4"><a href="https://hapi.fhir.org/" target="_blank" class="text-blue-600 hover:underline font-semibold">HAPI FHIR Server</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>FHIR Shorthand (FSH) Tooling</strong></td>
        <td class="p-4"><strong>Domain-specific language for defining FHIR Implementation Guides.</strong></td>
        <td class="p-4"><a href="https://fsh.fhir.org/" target="_blank" class="text-blue-600 hover:underline font-semibold">FHIR Shorthand Tooling</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>FHIR Data Transformation Utilities</strong></td>
        <td class="p-4">Tools like Microsoft's $convert-data endpoint and Liquid templates for data transformation.</td>
        <td class="p-4"><a href="https://learn.microsoft.com/en-us/azure/healthcare-apis/fhir/convert-data" target="_blank" class="text-blue-600 hover:underline font-semibold">Azure FHIR Converter</a></td>
    </tr>

    <!-- 4. Books & Multimedia -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">4. Books & Multimedia</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>Health Informatics on FHIR</strong></td>
        <td class="p-4"><strong>Comprehensive text on FHIR, context, and transformation in health IT.</strong></td>
        <td class="p-4"><a href="https://link.springer.com/book/10.1007/978-3-030-91563-6" target="_blank" class="text-blue-600 hover:underline font-semibold">Springer Link</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">Digital Health Today 360 Podcast</td>
        <td class="p-4">Interviews with innovators on health tech, data, and interoperability strategy.</td>
        <td class="p-4"><a href="https://digitalhealthtoday.com/show/digital-health-today-360/" target="_blank" class="text-blue-600 hover:underline font-semibold">Digital Health Today 360</a></td>
    </tr>

    <!-- 5. AI in Healthcare -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">5. AI in Healthcare (Development Resources)</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>BMA Principles for AI in Healthcare</strong></td>
        <td class="p-4"><strong>UK Guidance: Ethical, safe, and standards-compliant AI adoption for healthcare systems.</strong></td>
        <td class="p-4"><a href="https://www.bma.org.uk/media/njgfbmnn/bma-principles-for-artificial-intelligence-ai-and-its-application-in-healthcare.pdf" target="_blank" class="text-blue-600 hover:underline font-semibold">BMA PDF</a></td>
    </tr>

    <!-- 6. Security, Privacy & Data Protection -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">6. Security, Privacy & Data Protection</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>UK GDPR / Data Protection</strong></td>
        <td class="p-4"><strong>Government guidance on data protection, privacy, and compliance.</strong></td>
        <td class="p-4"><a href="https://www.gov.uk/data-protection" target="_blank" class="text-blue-600 hover:underline font-semibold">UK GDPR Guidance</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>NHS Data Security & Protection Toolkit (DSPT)</strong></td>
        <td class="p-4"><strong>Self-assessment framework for managing patient data within the NHS.</strong></td>
        <td class="p-4"><a href="https://www.dsptoolkit.nhs.uk/" target="_blank" class="text-blue-600 hover:underline font-semibold">DSPT Portal</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>DCB0160: Clinical Risk Management for IT Systems</strong></td>
        <td class="p-4">NHS clinical safety standard covering IT system lifecycle risk management.</td>
        <td class="p-4"><a href="https://digital.nhs.uk/services/clinical-safety" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS Clinical Safety</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">NCSC Health Sector Guidance</td>
        <td class="p-4">Guidance for securing healthcare IT systems.</td>
        <td class="p-4"><a href="https://www.ncsc.gov.uk/collection/health-sector" target="_blank" class="text-blue-600 hover:underline font-semibold">NCSC Health Guidance</a></td>
    </tr>

    <!-- 7. Data Standards & Terminologies -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">7. Data Standards & Terminologies</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>SNOMED CT UK Edition</strong></td>
        <td class="p-4"><strong>Comprehensive clinical terminology for consistent coding.</strong></td>
        <td class="p-4"><a href="https://digital.nhs.uk/services/terminology-and-classifications/snomed-ct" target="_blank" class="text-blue-600 hover:underline font-semibold">SNOMED CT UK</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>LOINC</strong></td>
        <td class="p-4"><strong>Laboratory and clinical observation coding standard.</strong></td>
        <td class="p-4"><a href="https://loinc.org/" target="_blank" class="text-blue-600 hover:underline font-semibold">LOINC</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">NHS Data Model and Dictionary</td>
        <td class="p-4">Authoritative definitions for NHS data elements.</td>
        <td class="p-4"><a href="https://www.datadictionary.nhs.uk/" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS Data Dictionary</a></td>
    </tr>

     <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">8. Clinical Decision Support & Workflow Integration</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>NHS Clinical Decision Support Guidance</strong></td>
        <td class="p-4"><strong>Official guidance for implementing CDS systems safely in UK healthcare.</strong></td>
        <td class="p-4"><a href="https://www.england.nhs.uk/digitaltechnology/info-infrastructure/cds/" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS CDS Guidance</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>HL7 CDS Hooks</strong></td>
        <td class="p-4"><strong>Standard for integrating decision support into EHR workflows in real time.</strong></td>
        <td class="p-4"><a href="https://cds-hooks.org/" target="_blank" class="text-blue-600 hover:underline font-semibold">CDS Hooks</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">OpenCDS / OpenClinical</td>
        <td class="p-4">Open-source platforms for building CDS systems.</td>
        <td class="p-4"><a href="https://www.opencds.com/" target="_blank" class="text-blue-600 hover:underline font-semibold">OpenCDS</a></td>
    </tr>

    <!-- 9. Deployment & Cloud Platforms -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">9. Deployment & Cloud Platforms</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>Azure API for FHIR</strong></td>
        <td class="p-4"><strong>Microsoft cloud FHIR server for storing and managing healthcare data securely.</strong></td>
        <td class="p-4"><a href="https://learn.microsoft.com/en-us/azure/healthcare-apis/fhir/overview" target="_blank" class="text-blue-600 hover:underline font-semibold">Azure FHIR API</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>AWS HealthLake</strong></td>
        <td class="p-4"><strong>Platform for aggregating, structuring, and analyzing health data using FHIR.</strong></td>
        <td class="p-4"><a href="https://aws.amazon.com/healthlake/" target="_blank" class="text-blue-600 hover:underline font-semibold">AWS HealthLake</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">NHS Cloud First Policy</td>
        <td class="p-4">UK NHS guidance recommending cloud adoption strategies for healthcare IT systems.</td>
        <td class="p-4"><a href="https://digital.nhs.uk/cyber-and-data-security/cloud-first" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS Cloud First</a></td>
    </tr>

    <!-- 10. Testing, Validation & QA -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">10. Testing, Validation & QA</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>FHIR Test Servers / Sandboxes</strong></td>
        <td class="p-4"><strong>Environment for testing FHIR resources, interactions, and workflows before production.</strong></td>
        <td class="p-4"><a href="https://hapi.fhir.org/" target="_blank" class="text-blue-600 hover:underline font-semibold">HAPI FHIR Server</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>UK Core IG Test Cases</strong></td>
        <td class="p-4"><strong>Framework for validating FHIR UK Core Implementation Guides.</strong></td>
        <td class="p-4"><a href="https://simplifier.net/guide/ukcore/" target="_blank" class="text-blue-600 hover:underline font-semibold">UK Core IG Simplifier</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">NHS Digital Testing Guidance</td>
        <td class="p-4">Official guidance for system testing and compliance before deployment.</td>
        <td class="p-4"><a href="https://digital.nhs.uk/services/standards-and-technology/testing" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS Testing Guidance</a></td>
    </tr>

    <!-- 11. Research & Innovation -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">11. Research & Innovation</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>NHS AI Lab</strong></td>
        <td class="p-4"><strong>UK-focused AI research lab driving innovation in healthcare AI and data projects.</strong></td>
        <td class="p-4"><a href="https://www.nhsx.nhs.uk/ai-lab/" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS AI Lab</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>Health Data Research UK (HDR UK)</strong></td>
        <td class="p-4"><strong>National institute for health data science enabling AI and data-driven research.</strong></td>
        <td class="p-4"><a href="https://www.hdruk.ac.uk/" target="_blank" class="text-blue-600 hover:underline font-semibold">HDR UK</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">UK FHIR Community / Dev Groups</td>
        <td class="p-4">Community-driven FHIR development and collaboration.</td>
        <td class="p-4"><a href="https://simplifier.net/" target="_blank" class="text-blue-600 hover:underline font-semibold">Simplifier.net</a></td>
    </tr>

    <!-- 12. Training & Learning Platforms -->
    <tr class="bg-gray-200">
        <td colspan="3" class="p-3 font-bold text-center">12. Training & Learning Platforms</td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4"><strong>HL7 FHIR Fundamentals Course</strong></td>
        <td class="p-4"><strong>Official HL7 course teaching FHIR fundamentals to developers.</strong></td>
        <td class="p-4"><a href="https://www.hl7.org/training/fhir-fundamentals.cfm" target="_blank" class="text-blue-600 hover:underline font-semibold">HL7 FHIR Fundamentals</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">HIMSS Learning Resources</td>
        <td class="p-4">Webinars and tutorials for digital health, interoperability, and AI.</td>
        <td class="p-4"><a href="https://www.himss.org/resources" target="_blank" class="text-blue-600 hover:underline font-semibold">HIMSS Learning</a></td>
    </tr>
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">Digital Health Today Webinars</td>
        <td class="p-4">UK & global webinars on health technology and innovation.</td>
        <td class="p-4"><a href="https://digitalhealthtoday.com/webinars/" target="_blank" class="text-blue-600 hover:underline font-semibold">Digital Health Today Webinars</a></td>
    </tr>
    <!-- Sandbox / API Resources -->
<tr class="bg-gray-200">
  <td colspan="3" class="p-3 font-bold text-center">Sandbox / API Resources</td>
</tr>
<tr class="border-b hover:bg-gray-50">
  <td class="p-4"><strong>Wales – MPI Sandbox</strong></td>
  <td class="p-4">Sandbox environment for the Master Patient Index (MPI) / PDQ service in Wales — allows patient‑matching and demographic lookups without using production data. Provided via NHS Wales API Portal sandbox.</td>
  <td class="p-4"><a href="https://apim-nonprod.developer.nhs.wales/docs/mpi-pdq-v0-1-sandbox/1/overview" target="_blank" class="text-blue-600 hover:underline font-semibold">MPI Sandbox Docs</a></td>
</tr>
<tr class="border-b hover:bg-gray-50">
  <td class="p-4"><strong>Wales – Shared Medicines Record (SMR) Sandbox</strong></td>
  <td class="p-4">Sandbox / test environment for the Shared Medicines Record API — provides access to medicines, allergies & intolerance data model (medicines list) in a safe, non‑production setting. SMR is the national medicines/allergy record for Wales.</td>
  <td class="p-4"><a href="https://apim-nonprod.developer.nhs.wales/docs/meds-fhir4-v0-1-sandbox/1/overview" target="_blank" class="text-blue-600 hover:underline font-semibold">SMR API Sandbox Docs</a></td>
</tr>
<tr class="border-b hover:bg-gray-50">
  <td class="p-4"><strong>Patient Flags Service – FHIR API (NHS England)</strong></td>
  <td class="p-4">National FHIR‑based sandbox API to retrieve patient flags (e.g. alerts, reasonable‑adjustments flags), suitable for development/testing against NHS England systems.</td>
  <td class="p-4"><a href="https://digital.nhs.uk/developer/api-catalogue/patient-flags-service---fhir-api" target="_blank" class="text-blue-600 hover:underline font-semibold">Patient Flags API Docs</a></td>
</tr>
<tr class="border-b hover:bg-gray-50">
  <td class="p-4"><strong>Prescriptions for Patients (EPS) – FHIR API (NHS England)</strong></td>
  <td class="p-4">Sandbox‑capable FHIR API for the Electronic Prescription Service — useful for building/testing prescription‑related integrations.</td>
  <td class="p-4"><a href="https://digital.nhs.uk/developer/api-catalogue" target="_blank" class="text-blue-600 hover:underline font-semibold">NHS API Catalogue (Search for EPS / Prescriptions)</a></td>
</tr>

</tbody>

        </table>
    </div>
    </div>
@endsection

